<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Asset;

class AssetsUseTerms extends Model
{
    use SoftDeletes;
    
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
