<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Asset;

class AssetsStatus extends Model
{
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
