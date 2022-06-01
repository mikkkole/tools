<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function show() 
    {
        return view('location.show', [
            'title' => 'Locations',
            'slot' => 'Здесь будет список всех Локаций',
        ]);
    }
}
