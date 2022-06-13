<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    public function assetsList()
    {
        return $this->hasMany(AssetsList::class);
        // $assets[] = '';
        // foreach ($this->hasMany(AssetsList::class) as $list) {
        //     $assets[] = $list->asset->name;
        // }
        // return $assets;
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
