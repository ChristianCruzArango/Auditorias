<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipoAuditor extends Model
{
    public function user () {
    	return $this->belongsToMany(User::class);
    }

    public function procesoAuditar () {
    	return $this->hasOne(ProcesoAuditar::class);
    }

    public function auditoria () {
    	return $this->belongsToMany(Auditorias::class);
    }

}
