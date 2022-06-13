<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AssetsGroup;
use App\AssetsManufacturer;
use App\AssetsCostCode;
use App\AssetsStatus;
use App\AssetsCategory;
use App\AssetsScancodeType;
use App\AssetsUseTerms;
use App\AssetsOwnershipType;
use App\AssetsImage;
use App\AssetsAttachment;
use App\Location;
use App\Company;


class Asset extends Model
{
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
        return $this->belongsToMany(AssetsImage::class);
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
