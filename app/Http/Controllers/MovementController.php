<?php

namespace App\Http\Controllers;

use App\Movement;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    public function show() 
    {
        $movements = Movement::all();
        return view('movement.show', [
            'title' => 'Movements',
            'slot' => 'Cписок всех Перемещений',
            'movements' => $movements,
        ]);
    }
}
