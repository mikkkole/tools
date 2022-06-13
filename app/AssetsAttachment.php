<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Asset;

class AssetsAttachment extends Model
{
    public function assets()
    {
        return $this->hasOne(Asset::class);
    }
}
