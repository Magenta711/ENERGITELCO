<?php

namespace App\Models\resource;

use Illuminate\Database\Eloquent\Model;

class cd extends Model
{
    protected $fillable = ['consecutivo_sede','id_beneficiario','departamento','municipio','centro_poblado','latitud','longitud','institucion_educativa','nombre_sede','tipo_sitio','detalle_sitio'];
}
