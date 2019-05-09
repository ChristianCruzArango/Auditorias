<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcesoAuditar extends Model
{
    public function procesoAuditar () {
    	return $this->belongsToMany(ProcesoAuditar::class);
    }

    public function auditoria () {
    	return $this->hasOne(Auditoria::class);
    }
}
