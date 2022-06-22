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

    public function one($categoryName) 
    {
        $categoryFullName = 'App\\' . $categoryName;
        $strings = $categoryFullName::all();
        return view('administration.one', [
            'title' => $categoryName,
            'slot' => 'Справочник ' . $categoryName,
            'strings' => $strings,
        ]);
    }
}