<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaVerificacion extends Model
{
    public function procesosAuditar () {
    	return $this->belongsToMany(ProcesoAuditar::class);
    }

    public function categoria () {
    	return $this->hasOne(Categoria::class);
    }
}
