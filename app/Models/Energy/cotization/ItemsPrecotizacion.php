<?php

namespace App\models\energy\cotization;

use Illuminate\Database\Eloquent\Model;

class ItemsPrecotizacion extends Model
{
    protected $table = 'items_precotizacions';

    protected $fillable = [
        'precotizacion_id',
        'objetivo_proyecto',
        'descripcion_proyecto',
        'validez_oferta',
        'polizas',
        'garantia_equipos',
        'garantia_celdas',
        'garantia_materiales',
        'verificacion_sistema',
        'nivel_sst',
        'mantenimiento',
        'nota_importante',
        'iva',
        'valor_kw',
        'usd'
    ];

    public function precotizacion()
    {
        return $this->belongsTo(Precotizacion::class, 'precotizacion_id');
    }
}
