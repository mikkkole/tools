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

class AssetController extends Controller
{
    public function show() 
    {
        $assets = Asset::all();
        return view('asset.show', [
            'title' => 'Assets',
            'slot' => 'Список всех Активов',
            'assets' => $assets,
        ]);
    }

    public function one(Request $request, $id) 
    {
        if ($request->input('edit') !==null) {
            $asset = Asset::find($id);
            $asset->name = $request->input('newName');
            $asset->model = $request->input('newModel');
            $asset->scancode = $request->input('newScancode');
            $asset->description = $request->input('newDescription');
            $asset->serial_number = $request->input('newSerialNumber');

            $asset->assets_group_id = AssetsGroup::where('name', $request->input('newAssetsGroupName'))->first()->id ?? $asset->assets_group_id;
            $asset->assets_manufacturer_id = AssetsManufacturer::where('name', $request->input('newAssetsManufacturerName'))->first()->id ?? $asset->assets_manufacturer_id;
            $asset->assets_status_id = AssetsStatus::where('name', $request->input('newAssetsStatusName'))->first()->id ?? $asset->assets_status_id;
            $asset->assets_category_id = AssetsCategory::where('name', $request->input('newAssetsCategoryName'))->first()->id ?? $asset->assets_category_id;
            $asset->default_location_id = Location::where('name', $request->input('newDefaultLocationName'))->first()->id ?? $asset->default_location_id;
            $asset->current_location_id = Location::where('name', $request->input('newCurrentLocationName'))->first()->id ?? $asset->current_location_id;
            $asset->assets_scancode_type_id = AssetsScancodeType::where('name', $request->input('newAssetsScancodeTypeName'))->first()->id ?? $asset->assets_scancode_type_id;
            $asset->assets_ownership_type_id = AssetsOwnershipType::where('name', $request->input('newAssetsOwnershipTypeName'))->first()->id ?? $asset->assets_ownership_type_id;
            $asset->assets_use_terms_id = AssetsUseTerms::where('name', $request->input('newAssetsUseTermsName'))->first()->id ?? $asset->assets_use_terms_id;
            $asset->assets_cost_code_id = AssetsCostCode::where('name', $request->input('newAssetsCostCodeName'))->first()->id ?? $asset->assets_cost_code_id;
            $asset->company_id = Company::where('name', $request->input('newCompanyName'))->first()->id ?? $asset->company_id;
            $asset->save();
        }

        $asset = Asset::find($id);
        return view('asset.one', [
            'title' => 'Asset',
            'slot' => 'Свойства Актива',
            'asset' => $asset,
        ]);
    }

    public function edit(Request $request) 
    {
        $id = $request->input('id');
        $asset = Asset::where('id', $id)->first();
        $assetsGroups = AssetsGroup::all();
        $assetsManufacturers = AssetsManufacturer::all();
        $assetsStatuss = AssetsStatus::all();
        $assetsCategorys = AssetsCategory::all();
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
            'assetsStatuss' => $assetsStatuss,
            'assetsCategorys' => $assetsCategorys,
            'locations' => $locations,
            'assetsScancodeTypes' => $assetsScancodeTypes,
            'assetsOwnershipTypes' => $assetsOwnershipTypes,
            'assetsUseTermses' => $assetsUseTermses,
            'assetsCostCodes' => $assetsCostCodes,
            'companies' => $companies,
        ]);
    }
}