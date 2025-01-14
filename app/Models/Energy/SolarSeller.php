<?php

namespace App\Models\Energy;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\SolarProducts;


class SolarSeller extends Model
{
    protected $table = "solar_sellers";
    protected $fillable = ['cod_sale','id_seller','id_Client','id_Product','warranty','valor', 'datesale'];

    public function seller()
    {
        return $this->hasOne(User::class, 'id', 'id_seller');
    }

    public function client()
    {
        return $this->hasOne(SolarClients::class, 'id', 'id_Client');
    }

    public function product()
    {
        return $this->hasOne(SolarProducts::class, 'id', 'id_Product');
    }

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }
}
