<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN=1;
    const USUARIO=2;
    const AUDITOR=3;
}
