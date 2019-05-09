<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    public function listaVerificacion () {
    	return $this->hasOne(ListaVerificacion::class);
    }
}
