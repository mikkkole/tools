<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetsList extends Model
{
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    
    public function movement()
    {
        return $this->belongsTo(Movement::class);
    }
    
}
