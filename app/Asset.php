<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use SoftDeletes;

    public function assetsGroup()
    {
        return $this->belongsTo(AssetsGroup::class);
    }
    
    public function assetsManufacturer()
    {
        return $this->belongsTo(AssetsManufacturer::class);
    }
        
    public function assetsCostCode()
    {
        return $this->belongsTo(AssetsCostCode::class);
    }
        
    public function assetsStatus()
    {
        return $this->belongsTo(AssetsStatus::class);
    }
        
    public function assetsCategory()
    {
        return $this->belongsTo(AssetsCategory::class);
    }
        
    public function assetsScancodeType()
    {
        return $this->belongsTo(AssetsScancodeType::class);
    }
        
    public function assetsUseTerms()
    {
        return $this->belongsTo(AssetsUseTerms::class);
    }
        
    public function assetsOwnershipType()
    {
        return $this->belongsTo(AssetsOwnershipType::class);
    }
        
    public function assetsImage()
    {
        return $this->hasMany(AssetsImage::class);
    }
     
    public function assetsImageFirst($assetId)
    {
        return AssetsImage::where('asset_id', $assetId)->first();
    }

    public function assetsAttachment()
    {
        return $this->belongsToMany(AssetsAttachment::class);
    }
        
    public function defaultLocation()
    {
        return $this->belongsTo(Location::class);
    }      

    public function currentLocation()
    {
        return $this->belongsTo(Location::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
