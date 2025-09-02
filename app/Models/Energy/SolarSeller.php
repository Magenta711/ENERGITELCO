<?php

namespace App\Models\Energy;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\SolarProducts;


class SolarSeller extends Model
{
    protected $table = "solar_sellers";
    protected $fillable = ['cod_sale','id_seller','id_Client','id_Product','itemList','productsList','warranty','valor', 'datesale'];

    protected $casts = [
        'productsList' => 'array',
        'itemList' => 'array',
    ];

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

    public function ProductsLists()
    {
        $productsLists=[];
        foreach ($this->productsList as $item) {
        $found = false;
        foreach ($productsLists as &$existingItem) {
            if ($existingItem['type'] == $item['type']) {
                $existingItem['amount'] = isset($existingItem['amount']) ? $existingItem['amount'] + 1 : 2;
                $found = true;
                break;
            }
        }
        unset($existingItem);

        if(!$found){
            if ($item['type'] == 'SolarProduct') {
                    $itemDetails = SolarProducts::find($item['id']);
                    $item['details'] = $itemDetails;
                }
                if ($item['type'] == 'SolarKit') {
                    $itemDetails = SolarKit::find($item['id']);
                    $item['details'] = $itemDetails;
                }
                $item['amount'] = 1;
            $productsLists[] = $item;
            }
        }
        return $productsLists;
    }
}
