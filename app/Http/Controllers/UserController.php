<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show() 
    {
        $users = User::all();
        return view('user.show', [
            'title' => 'Workers',
            'slot' => 'Cписок всех Сотрудников',
            'users' => $users,
        ]);
    }
}
