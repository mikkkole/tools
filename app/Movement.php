<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movement extends Model
{
    use SoftDeletes;
    
    public function assetsList()
    {
        return $this->hasMany(AssetsList::class);
    }    
    
    public function locationFrom()
    {
        return $this->belongsTo(Location::class);
    }
        
    public function locationTo()
    {
        return $this->belongsTo(Location::class);
    }
        
    public function movementStatus()
    {
        return $this->belongsTo(MovementStatus::class);
    }
        
    public function userComfirmed()
    {
        return $this->belongsTo(User::class);
    }
        
    public function userSend()
    {
        return $this->belongsTo(User::class);
    }
        
    public function userRecieved()
    {
        return $this->belongsTo(User::class);
    }
        
    public function userWrited()
    {
        return $this->belongsTo(User::class);
    }
        
    public function movementCostCenter()
    {
        return $this->belongsTo(MovementCostCenter::class);
    }
        
    public function movementTaskCode()
    {
        return $this->belongsTo(MovementTaskCode::class);
    }
        
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    

}
