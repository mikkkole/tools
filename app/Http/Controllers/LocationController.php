<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Company;
use App\LocationType;
use App\LocationStatus;
use App\LocationHierarchy;
use App\User;



class LocationController extends Controller
{
    public function show() 
    {
        $locations = Location::withTrashed()->get();
        return view('location.show', [
            'title' => 'Locations',
            'slot' => 'Cписок всех Локаций',
            'locations' => $locations,
        ]);
    }

    public function one(Request $request, $id) 
    {
        if ($request->input('edit') !==null) {
            if ($id == 0 ) {
                $location = new Location;
            } else {
                $location = Location::withTrashed()->where('id', $id)->first();
            }

            $location->name = $request->input('newName');

            $location->location_type_id = $request->input('newLocationTypeId') ?? $location->location_type_id;

            $location->location_status_id = $request->input('newLocationStatusId') ?? $location->location_status_id;

            $location->location_hierarchy_id = $request->input('newLocationHierarchyId') ?? $location->location_hierarchy_id;

            $location->location_manager_id = $request->input('newLocationManagerId') ?? $location->location_manager_id;

            $location->location_parent_id = $request->input('newLocationParentId') ?? $location->location_parent_id;

            $location->company_id = $request->input('newCompanyId') ?? $location->company_id;
            
            $location->save();
            $id = $location->id;
        }

        if ($request->input('delete') =='true') {
            $deleteItem = Location::withTrashed()->where('id', $id)->first();
            if ($deleteItem->deleted_at == NULL) {
                $deleteItem->delete();
            } else {
                $deleteItem->restore();
            }
        }
        
        $location = Location::withTrashed()->where('id', $id)->first();
        return view('location.one', [
            'title' => 'location',
            'slot' => 'Свойства Локации',
            'location' => $location,
        ]);
    }

    public function edit(Request $request) 
    {
        $id = $request->input('id');
        $location = Location::withTrashed()->where('id', $id)->first();
        $locationTypes = LocationType::all();
        $locationStatuses = LocationStatus::all();
        $locationHierarchies = LocationHierarchy::all();
        $locationManagers = User::all();
        $locationParents = Location::all();
        $companies = Company::all();
        return view('location.edit', [
            'title' => 'location',
            'slot' => 'Изменение Локации',
            'location' => $location,
            'locationTypes' => $locationTypes,
            'locationStatuses' => $locationStatuses,
            'locationHierarchies' => $locationHierarchies,
            'locationManagers' => $locationManagers,
            'locationParents' => $locationParents,
            'companies' => $companies,
        ]);
    }

    public function addNew(Request $request) //запрос для выбора шаблона
    {
        $location = new Location; //заменить на шаблоны
        $locationTypes = LocationType::all();
        $locationStatuses = LocationStatus::all();
        $locationHierarchies = LocationHierarchy::all();
        $locationManagers = User::all();
        $locationParents = Location::all();
        $companies = Company::all();
        return view('location.edit', [
            'title' => 'location',
            'slot' => 'Добавление Локации',
            'location' => $location,
            'locationTypes' => $locationTypes,
            'locationStatuses' => $locationStatuses,
            'locationHierarchies' => $locationHierarchies,
            'locationManagers' => $locationManagers,
            'locationParents' => $locationParents,
            'companies' => $companies,
        ]);
    }
}
