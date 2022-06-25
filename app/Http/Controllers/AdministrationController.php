<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetsCategory;

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

        $categoryItems = $categoryFullName::all();

        return view('administration.one', [
            'title' => $categoryName,
            'slot' => 'Справочник ' . $categoryName,
            'categoryItems' => $categoryItems,
            'id' => $id,
        ]);
    }

    public function edit(Request $request)
    {
        $name = $request->input('name');
        dump($request->all());
        return view('administration.edit', ['name' => $name]);
    }
}