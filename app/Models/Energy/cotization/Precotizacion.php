<?php

namespace App\models\energy\cotization;

use App\Models\ClientsUsers\Clients;
use App\Models\Energy\SolarClients;
use App\Models\file;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Precotizacion extends Model
{
    protected $table = 'precotizacions';

    protected $fillable = [
        'token',
        'client_id',
        'locateProject',
        'claseSystem',
        'typeProject',
        'estrato',
        'consumo',
        'radiacion',
        'status',
        'responsable_id',
        'telefeno_responsable',
        'direccion_responsable',
        'email',
    ];

    public function client()
    {
        return $this->belongsTo(SolarClients::class, 'client_id');
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }

    public function items()
    {
        return $this->hasOne(ItemsPrecotizacion::class, 'precotizacion_id');
    }

    public function flujos()
    {
        return $this->hasMany(FlujosPrecotizacion::class, 'precotizacion_id');
    }

    public function precios()
    {
        return $this->hasMany(PreciosPrecotizacion::class, 'precotizacion_id');
    }

    public function simulacion()
    {
        return $this->hasOne(SimulacionPrecotizacion::class, 'precotizacion_id');
    }

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }
}
