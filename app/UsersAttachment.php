<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersAttachment extends Model
{
    public function users()
    {
        return $this->hasOne(User::class);
    }
}
