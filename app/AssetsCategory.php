<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetsCategory extends Model
{
    use SoftDeletes;
    
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
