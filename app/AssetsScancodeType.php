<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Asset;

class AssetsScancodeType extends Model
{
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
