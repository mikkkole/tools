<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetsList extends Model
{
    use SoftDeletes;
    
    public function asset()
    {
        return $this->belongsTo(Asset::class)->withTrashed();
    }
    
    public function movement()
    {
        return $this->belongsTo(Movement::class)->withTrashed();
    }
    
}
