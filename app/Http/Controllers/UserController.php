<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserLanguage;
use App\UserResponsibility;
use App\UserRole;
use App\UserType;
use App\Company;
use App\UsersImage;

class UserController extends Controller
{
    public function show() 
    {
        $users = User::withTrashed()->get();;
        return view('user.show', [
            'title' => 'Workers',
            'slot' => 'Cписок всех Сотрудников',
            'users' => $users,
        ]);
    }

    public function one(Request $request, $id) 
    {
        if ($request->input('edit') !==null) {
            if ($id == 0 ) {
                $user = new User;
            } else {
                $user = User::withTrashed()->where('id', $id)->first();
            }

            $user->name = $request->input('newName');
            $user->patronymic = $request->input('newPatronymic');
            $user->surname = $request->input('newSurname');
            $user->email = $request->input('newEmail');
            $user->email_verified_at = $request->input('newEmail_verified_at');
            $user->login = $request->input('newLogin');
            $user->position = $request->input('newPosition');

            $user->user_role_id = $request->input('newUserRoleId') ?? $user->user_role_id;
            $user->user_type_id = $request->input('newUserTypeId') ?? $user->user_type_id;
            $user->user_responsibility_id = $request->input('newUserResponsibilityId') ?? $user->user_responsibility_id;
            $user->user_language_id = $request->input('newUserLanguageId') ?? $user->user_language_id;
            $user->company_id = $request->input('newCompanyId') ?? $user->company_id;

            $user->save();
            $id = $user->id;

            foreach ((array) $request->input('imgDelete') as $imgDelete) {
                $deleteItem = UsersImage::withTrashed()->where('id', $imgDelete)->first();
                if ($deleteItem->deleted_at == NULL) {
                    $deleteItem->delete();
                } else {
                    $deleteItem->restore();
                }
            }

            if ($request->file('imgAdd')) {
                
                $request->validate(['imgAdd' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);

                $imageName = time().'.'.$request->imgAdd->extension();
                
                $request->imgAdd->move(public_path('images'), $imageName);

                $newImage = new UsersImage;
                $newImage->filename = $imageName;
                $newImage->user_id = $id;
                $newImage->save();
            }
        }

        if ($request->input('delete') =='true') {
            $deleteItem = User::withTrashed()->where('id', $id)->first();
            if ($deleteItem->deleted_at == NULL) {
                $deleteItem->delete();
            } else {
                $deleteItem->restore();
            }
        }

        $user = User::withTrashed()->where('id', $id)->first();
        return view('user.one', [
            'title' => 'user',
            'slot' => 'Свойства Работника',
            'user' => $user,
        ]);
    }

    public function edit(Request $request) 
    {
        $id = $request->input('id');
        $user = User::withTrashed()->where('id', $id)->first();
        $userRoles = UserRole::all();
        $userTypes = UserType::all();
        $userResponsibilities = UserResponsibility::all();
        $userLanguages = UserLanguage::all();
        $companies = Company::all();
        return view('user.edit', [
            'title' => 'user',
            'slot' => 'Изменение работника',
            'user' => $user,
            'userRoles' => $userRoles,
            'userTypes' => $userTypes,
            'userResponsibilities' => $userResponsibilities,
            'userLanguages' => $userLanguages,
            'companies' => $companies,
        ]);
    }
}