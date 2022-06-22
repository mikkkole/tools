<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    public function show() 
    {
        $locations = Location::all();
        return view('location.show', [
            'title' => 'Locations',
            'slot' => 'Cписок всех Локаций',
            'locations' => $locations,
        ]);
    }

    public function one($id) 
    {
        $location = Location::where('id', $id)->first();
        return view('location.one', [
            'title' => 'location',
            'slot' => 'Свойства Локации',
            'location' => $location,
        ]);
    }
}
