<?php

namespace App\Models\resource;

use Illuminate\Database\Eloquent\Model;

class eb extends Model
{
    protected $fillable = ['id_sitio','departamento','municipio','sitio','latitud','longitud','ubicacion','centro_poblado'];
}
