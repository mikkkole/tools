<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Asset;

class AssetsImage extends Model
{
    use SoftDeletes;
    
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
