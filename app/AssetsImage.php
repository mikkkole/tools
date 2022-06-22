<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Asset;

class AssetsImage extends Model
{
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
