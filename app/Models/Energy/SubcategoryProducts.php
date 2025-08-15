<?php

namespace App\Models\Energy;

use App\Models\SolarProducts;
use Illuminate\Database\Eloquent\Model;

class SubcategoryProducts extends Model
{
    protected $table = 'subcategory_products';

    protected $fillable = [
        'name',
        'amount',
        'category_id',
    ];

    public function products()
    {
        return $this->hasMany(SolarProducts::class, 'subcategory_id', 'id');
    }

    public function SameProducts()
    {
        $products = $this->products()
            ->get()
            ->groupBy('type')
            ->map(function ($items) {
                return $items->first(); // El primer producto de ese tipo
            })
            ->values(); // para resetear los índices

        return $products;
    }

    public function AvailableProducts($type, $status)
    {
        return $this->products()
            ->where('status', $status)
            ->where('type', $type)
            ->count();
    }

    public function SoldProducts()
    {
        return $this->products()
            ->where('status', 3)
            ->count();
    }
}
