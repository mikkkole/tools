<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetsList;
use App\Location;
use App\Movement;
use App\MovementCostCenter;
use App\MovementStatus;
use App\MovementTaskCode;
use App\User;
use App\Company;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    public function show() 
    {
        $movements = Movement::withTrashed()->get();
        return view('movement.show', [
            'title' => 'Movements',
            'slot' => 'Cписок всех Перемещений',
            'movements' => $movements,
        ]);
    }

    public function one(Request $request, $id) 
    {
        if ($request->input('edit') !==null) {
            if ($id == 0 ) {
                $movement = new Movement;
            } else {
                $movement = Movement::withTrashed()->where('id', $id)->first();
            }

            $movement->comments = $request->input('newComments');
            $movement->app_used = $request->input('newAppUsed');

            // изменение списка активов в перемещении???

            $movement->location_from_id = $request->input('newLocationFromId') ?? $movement->location_from_id;

            $movement->location_to_id = $request->input('newLocationToId') ?? $movement->location_to_id;

            $movement->movement_status_id = $request->input('newMovementStatus') ?? $movement->movement_status_id;

            $movement->confirmed_at = $request->input('newConfirmedAt');

            $movement->user_comfirmed_id = $request->input('newUserComfirmedId') ?? $movement->user_comfirmed_id;

            $movement->user_send_id = $request->input('newUserSendId') ?? $movement->user_send_id;

            $movement->user_recieved_id = $request->input('newUserRecievedId') ?? $movement->user_recieved_id;

            $movement->user_writed_id = $request->input('newUserWritedId') ?? $movement->user_writed_id;

            $movement->returned_at = $request->input('newReturnedAt');

            $movement->movement_cost_center_id = $request->input('newMovementCostCenterId') ?? 
            $movement->movement_cost_center_id;

            $movement->movement_task_code_id = $request->input('newMovementTaskCodeId') ?? $movement->movement_task_code_id;

            $movement->company_id = $request->input('newCompanyId') ?? $movement->company_id;

            $movement->save();
            $id = $movement->id;

            foreach ((array) $request->input('listDelete') as $listDelete) {
                $deleteItem = AssetsList::withTrashed()->where('id', $listDelete)->first();
                $deleteItem->delete();
            }

            foreach ((array) $request->input('listAdd') as $listAdd) {
                $newList =  new AssetsList;
                $newList->asset_id = $listAdd;
                $newList->movement_id = $id;
                $newList->save();

            }
        }

        if ($request->input('delete') =='true') {
            $deleteItem = Movement::withTrashed()->where('id', $id)->first();
            if ($deleteItem->deleted_at == NULL) {
                $deleteItem->delete();
            } else {
                $deleteItem->restore();
            }
        }
        
        $movement = Movement::withTrashed()->where('id', $id)->first();
        return view('movement.one', [
            'title' => 'movement',
            'slot' => 'Свойства Перемещения',
            'movement' => $movement,
        ]);
    }

    public function edit(Request $request) 
    {
        $id = $request->input('id');
        $movement = Movement::withTrashed()->where('id', $id)->first();
        $locations = Location::withTrashed()->get();
        $assets = Asset::withTrashed()->get();
        $movementStatuses = MovementStatus::withTrashed()->get();
        $users = User::withTrashed()->get();
        $movementCostCenters = MovementCostCenter::withTrashed()->get();
        $movementTaskCodes = MovementTaskCode::withTrashed()->get();
        $assetsLists = AssetsList::withTrashed()->get();
        $companies = Company::withTrashed()->get();
        return view('movement.edit', [
            'title' => 'Movement',
            'slot' => 'Изменение Перемещения',
            'movement' => $movement,
            'assets' => $assets,
            'locations' => $locations,
            'movementStatuses' => $movementStatuses,
            'users' => $users,
            'movementCostCenters' => $movementCostCenters,
            'movementTaskCodes' => $movementTaskCodes,
            'assetsLists' => $assetsLists,
            'companies' => $companies,
        ]);
    }

    public function addNew(Request $request) //запрос для выбора шаблона
    {
        $movement = new Movement; //заменить на шаблоны
        $locations = Location::withTrashed()->get();
        $movementStatuses = MovementStatus::withTrashed()->get();
        $users = User::withTrashed()->get();
        $assets = Asset::withTrashed()->get();
        $movementCostCenters = MovementCostCenter::withTrashed()->get();
        $movementTaskCodes = MovementTaskCode::withTrashed()->get();
        $assetsLists = AssetsList::withTrashed()->get();
        $companies = Company::withTrashed()->get();
        return view('movement.edit', [
            'title' => 'Movement',
            'slot' => 'Добавление Перемещения',
            'movement' => $movement,
            'assets' => $assets,
            'locations' => $locations,
            'movementStatuses' => $movementStatuses,
            'users' => $users,
            'movementCostCenters' => $movementCostCenters,
            'movementTaskCodes' => $movementTaskCodes,
            'assetsLists' => $assetsLists,
            'companies' => $companies,
        ]);
    }
}
