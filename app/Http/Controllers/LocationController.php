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
}
