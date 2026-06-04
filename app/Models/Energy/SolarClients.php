<?php

namespace App\Models\Energy;

use Illuminate\Database\Eloquent\Model;

class SolarClients extends Model
{
    protected $table = "solar_clients";
    protected $fillable = ['name','typeId','ide','email','tel','type_client','locate'];

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }

    public function ventas()
    {
        return $this->hasMany(SolarSeller::class, 'id_Client', 'id');
    }
}
