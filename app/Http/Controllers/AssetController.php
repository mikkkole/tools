<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\AssetsGroup;
use App\AssetsManufacturer;
use App\AssetsStatus;
use App\AssetsCategory;
use App\Location;
use App\AssetsScancodeType;
use App\AssetsOwnershipType;
use App\AssetsUseTerms;
use App\AssetsCostCode;
use App\Company;
use App\AssetsImage;

class AssetController extends Controller
{
    public function show() 
    {
        $assets = Asset::withTrashed()->get();
        return view('asset.show', [
            'title' => 'Assets',
            'slot' => 'Список всех Активов',
            'assets' => $assets,
        ]);
    }

    public function one(Request $request, $id) 
    {
        if ($request->input('edit') !==null) {
            if ($id == 0 ) {
                $asset = new Asset;
            } else {
                $asset = Asset::withTrashed()->where('id', $id)->first();
            }

            $asset->name = $request->input('newName');
            $asset->model = $request->input('newModel');
            $asset->scancode = $request->input('newScancode');
            $asset->description = $request->input('newDescription');
            $asset->serial_number = $request->input('newSerialNumber');

            $asset->assets_group_id = $request->input('newAssetsGroupId') ?? $asset->assets_group_id;

            $asset->assets_manufacturer_id = $request->input('newAssetsManufacturerId') ?? $asset->assets_manufacturer_id;

            $asset->assets_status_id = $request->input('newAssetsStatusId') ?? $asset->assets_status_id;

            $asset->assets_category_id = $request->input('newAssetsCategoryId') ?? $asset->assets_category_id;

            $asset->default_location_id = $request->input('newDefaultLocationId') ?? $asset->default_location_id;

            $asset->current_location_id = $request->input('newCurrentLocationId') ?? $asset->current_location_id;

            $asset->assets_scancode_type_id = $request->input('newAssetsScancodeTypeId') ?? $asset->assets_scancode_type_id;

            $asset->assets_ownership_type_id = $request->input('newAssetsOwnershipTypeId') ?? 
            $asset->assets_ownership_type_id;

            $asset->assets_use_terms_id = $request->input('newAssetsUseTermsId') ?? $asset->assets_use_terms_id;

            $asset->assets_cost_code_id = $request->input('newAssetsCostCodeId') ?? $asset->assets_cost_code_id;

            $asset->company_id = $request->input('newCompanyId') ?? $asset->company_id;

            $asset->save();
            $id = $asset->id;

            foreach ((array) $request->input('imgDelete') as $imgDelete) {
                $deleteItem = AssetsImage::withTrashed()->where('id', $imgDelete)->first();
                if ($deleteItem->deleted_at == NULL) {
                    $deleteItem->delete();
                } else {
                    $deleteItem->restore();
                }
            }

            if ($request->file('imgAdd')) {
                
                $request->validate(['imgAdd' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);

                $imageName = time().'.'.$request->imgAdd->extension();
                
                $request->imgAdd->move(public_path('images'), $imageName);

                $newImage = new AssetsImage;
                $newImage->filename = $imageName;
                $newImage->asset_id = $id;
                $newImage->save();
            }
        }

        if ($request->input('delete') =='true') {
            $deleteItem = Asset::withTrashed()->where('id', $id)->first();
            if ($deleteItem->deleted_at == NULL) {
                $deleteItem->delete();
            } else {
                $deleteItem->restore();
            }
        }

        $asset = Asset::withTrashed()->where('id', $id)->first();
        return view('asset.one', [
            'title' => 'Asset',
            'slot' => 'Свойства Актива',
            'asset' => $asset,
        ]);
    }

    public function edit(Request $request) 
    {
        $id = $request->input('id');
        $asset = Asset::withTrashed()->where('id', $id)->first();
        $assetsGroups = AssetsGroup::all();
        $assetsManufacturers = AssetsManufacturer::all();
        $assetsStatuses = AssetsStatus::all();
        $assetsCategories = AssetsCategory::all();
        $locations = Location::all();
        $assetsScancodeTypes = AssetsScancodeType::all();
        $assetsOwnershipTypes = AssetsOwnershipType::all();
        $assetsUseTermses = AssetsUseTerms::all();
        $assetsCostCodes = AssetsCostCode::all();
        $companies = Company::all();
        return view('asset.edit', [
            'title' => 'Asset',
            'slot' => 'Изменение Актива',
            'asset' => $asset,
            'assetsGroups' => $assetsGroups,
            'assetsManufacturers' => $assetsManufacturers,
            'assetsStatuses' => $assetsStatuses,
            'assetsCategories' => $assetsCategories,
            'locations' => $locations,
            'assetsScancodeTypes' => $assetsScancodeTypes,
            'assetsOwnershipTypes' => $assetsOwnershipTypes,
            'assetsUseTermses' => $assetsUseTermses,
            'assetsCostCodes' => $assetsCostCodes,
            'companies' => $companies,
        ]);
    }

    public function addNew(Request $request) //запрос для выбора шаблона
    {
        $asset = new Asset; //заменить на шаблоны
        $assetsGroups = AssetsGroup::all();
        $assetsManufacturers = AssetsManufacturer::all();
        $assetsStatuses = AssetsStatus::all();
        $assetsCategories = AssetsCategory::all();
        $locations = Location::all();
        $assetsScancodeTypes = AssetsScancodeType::all();
        $assetsOwnershipTypes = AssetsOwnershipType::all();
        $assetsUseTermses = AssetsUseTerms::all();
        $assetsCostCodes = AssetsCostCode::all();
        $companies = Company::all();
        return view('asset.edit', [
            'title' => 'Asset',
            'slot' => 'Добавление Актива',
            'asset' => $asset,
            'assetsGroups' => $assetsGroups,
            'assetsManufacturers' => $assetsManufacturers,
            'assetsStatuses' => $assetsStatuses,
            'assetsCategories' => $assetsCategories,
            'locations' => $locations,
            'assetsScancodeTypes' => $assetsScancodeTypes,
            'assetsOwnershipTypes' => $assetsOwnershipTypes,
            'assetsUseTermses' => $assetsUseTermses,
            'assetsCostCodes' => $assetsCostCodes,
            'companies' => $companies,
        ]);
    }
}