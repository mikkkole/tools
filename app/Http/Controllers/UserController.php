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

    public function one($id) 
    {
        $user = User::where('id', $id)->first();
        return view('user.one', [
            'title' => 'user',
            'slot' => 'Свойства Работника',
            'user' => $user,
        ]);
    }
}
