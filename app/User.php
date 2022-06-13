<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\UserRole;
use App\UserType;
use App\UserResponsibility;
use App\UserLanguage;
use App\UsersImage;
use App\UsersAttachment;
use App\Company;
use App\Location;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userRole()
    {
        return $this->belongsTo(UserRole::class);
    }
        
    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }
        
    public function userResponsibility()
    {
        return $this->belongsTo(UserResponsibility::class);
    }      

    public function userLanguage()
    {
        return $this->belongsTo(UserLanguage::class);
    }

    public function usersImage()
    {
        return $this->belongsToMany(UsersImage::class);
    }
        
    public function usersAttachment()
    {
        return $this->belongsToMany(UsersAttachment::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
