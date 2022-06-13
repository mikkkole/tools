<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersImage extends Model
{
    public function users()
    {
        return $this->hasOne(User::class);
    }
}
