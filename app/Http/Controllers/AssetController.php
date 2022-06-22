<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;

class AssetController extends Controller
{
    public function show() 
    {
        $assets = Asset::all();
        //var_dump($assets);
        return view('asset.show', [
            'title' => 'Assets',
            'slot' => 'Список всех Активов',
            'assets' => $assets,
        ]);
    }

    public function one($id) 
    {
        $asset = Asset::where('id', $id)->first();
        //dump($asset);
        return view('asset.one', [
            'title' => 'Asset',
            'slot' => 'Свойства Актива',
            'asset' => $asset,
        ]);
    }
}