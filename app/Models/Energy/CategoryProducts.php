<?php

namespace App\Models\Energy;

use App\Models\SolarProducts;
use Illuminate\Database\Eloquent\Model;

class CategoryProducts extends Model
{
    protected $table = 'category_products';

    protected $fillable = [
        'name',
        'amount',
    ];

    public function subcategories()
    {
        return $this->hasMany(SubcategoryProducts::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(SolarProducts::class, 'category_id');
    }

    public function CountCategoryProducts($categoyId)
    {
        return $this->products()
            ->where('category_id', $categoyId)
            ->count();
    }

    public function SoldProducts($type)
    {
        return $this->products()
            ->where('status', 3)
            ->where('type', $type)
            ->count();
    }
}
