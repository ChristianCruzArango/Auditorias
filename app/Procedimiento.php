<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    public function proceso () {
    	return $this->belongsToMany(Proceso::class);
    }
}
