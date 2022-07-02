<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class UserRole extends Model
{
    use SoftDeletes;
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
