<?php

namespace App\Models\Energy;

use Illuminate\Database\Eloquent\Model;

class SolarKit extends Model
{
    protected $table = 'solar_kits';

    protected $fillable = [
        'cod_kit',
        'name',
        'type',
        'products',
        'caracteristics',
        'description',
        'warranty',
        'price',
        'price_install',
        'price_transporte',
        'discount',
        'final_price',
        'urlFile',
        'status',
        'alto',
        'ancho',
        'largo',
        'peso',
    ];

    protected $casts = [
        'products' => 'array',
    ];

    public static function CountTypes($type)
    {
        return self::where('type', $type)->count();
    }

    public static function TypeKit()
    {
        $types = self::select('type')->distinct()->pluck('type');
        $kits = [];
        foreach ($types as $type) {
            $kits[] = self::where('type', $type)->first();
        }
        return $kits;
    }

    public static function TypeKitFree()
    {
        $types = self::select('type')->distinct()->pluck('type');
        $kits = [];
        foreach ($types as $type) {
            $kits[] = self::where('type', $type)->where('status', 1)->first();
        }
        return $kits;
    }
}
