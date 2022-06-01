<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function show() 
    {
        return view('asset.show', [
            'title' => 'Assets',
            'slot' => 'Здесь будет список всех Активов',
        ]);
    }
}