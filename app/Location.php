<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Asset;
use App\LocationType;
use App\LocationStatus;
use App\LocationHierarchy;
use App\User;
use App\Company;

class Location extends Model
{
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function locationType()
    {
        return $this->belongsTo(LocationType::class);
    }
    
    public function locationStatus()
    {
        return $this->belongsTo(LocationStatus::class);
    }
    
    public function locationHierarchy()
    {
        return $this->belongsTo(LocationHierarchy::class);
    }
    
    public function locationManager()
    {
        return $this->belongsTo(User::class);
    }
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function locationParent()
    {
        return $this->belongsTo(Location::class);
    }
}
