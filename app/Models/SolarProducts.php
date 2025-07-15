<?php

namespace App\Models;

use App\Models\Energy\CategoryProducts;
use App\Models\Energy\SubcategoryProducts;
use Illuminate\Database\Eloquent\Model;

class SolarProducts extends Model
{
    protected $table = "solar_products";
    protected $fillable = ['id_buyer', 'category_id', 'subcategory_id', 'cod_product', 'amount','type', 'model', 'serie', 'price', 'power', 'warranty', 'ancho', 'alto', 'largo', 'peso', 'description', 'urlFile','status'];

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }

    public function category()
    {
        return $this->belongsTo(CategoryProducts::class, 'id', 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubcategoryProducts::class, 'subcategory_id');
    }
}
