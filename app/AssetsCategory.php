<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetsCategory extends Model
{
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
