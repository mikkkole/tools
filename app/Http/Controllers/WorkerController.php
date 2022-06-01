<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function show() 
    {
        return view('worker.show', [
            'title' => 'Workers',
            'slot' => 'Здесь будет список всех Сотрудников',
        ]);
    }
}
