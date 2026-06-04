<?php

namespace App\models\energy;

use Illuminate\Database\Eloquent\Model;

class cotizaciones extends Model
{
    protected $table = 'cotizaciones';
    protected $fillable = [
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
        'potenciaPanel',
        'margenError',
        'notaPrecio'
    ];

    public function flujos()
    {
        return $this->hasMany(FlujosInversion::class, 'cotizacion_id');
    }

    // Relación: una cotización tiene muchos precios
    public function precios()
    {
        return $this->hasMany(EnergyCotizacionesPrecio::class, 'cotizacion_id');
    }

    public function simulacionItems()
    {
        return $this->hasOne(simulacionItems::class, 'cotizacion_id');
    }
}
