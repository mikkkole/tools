<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function show() 
    {
        return view('administration.show', [
            'title' => 'Administration',
            'slot' => 'Администрирование справочников',
        ]);
    }

    public function one(Request $request, $categoryName) 
    {
        $categoryFullName = 'App\\' . $categoryName;
        $id = $request->input('id');
        $newName = $request->input('newName');
        $addNewName = $request->input('addNewName');
        $deleteId = $request->input('deleteId');

        if (isset($newName)) {
            $categoryItem = $categoryFullName::find($id);
            $categoryItem->name = $newName;
            $categoryItem->save();
            $id = '';
        }

        if (isset($addNewName)) {
            $categoryItem = new $categoryFullName;
            $categoryItem->name = $addNewName;
            $categoryItem->save();
        }

        if (isset($deleteId)) {
            $deleteItem = $categoryFullName::withTrashed()->where('id', $deleteId)->first();
            if ($deleteItem->deleted_at == NULL) {
                $deleteItem->delete();
            } else {
                $deleteItem->restore();
            }
        }

        $categoryItems = $categoryFullName::withTrashed()->get();

        return view('administration.one', [
            'title' => $categoryName,
            'slot' => 'Справочник ' . $categoryName,
            'categoryItems' => $categoryItems,
            'id' => $id,
        ]);
    }
}