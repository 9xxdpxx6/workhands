<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function images() {
        return $this->hasMany('App\ServiceImage');
    }
}
