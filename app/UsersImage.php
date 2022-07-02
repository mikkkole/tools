<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class UsersImage extends Model
{
    use SoftDeletes;
    
    public function users()
    {
        return $this->hasOne(User::class);
    }
}
