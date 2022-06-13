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
}
