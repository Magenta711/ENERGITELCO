<?php

namespace App\Models;

use App\Models\Energy\CategoryProducts;
use App\Models\Energy\SubcategoryProducts;
use Illuminate\Database\Eloquent\Model;

class SolarProducts extends Model
{
    protected $table = "solar_products";
    protected $fillable = ['id_buyer', 'category_id', 'subcategory_id', 'cod_product', 'amount', 'type', 'model', 'serie', 'price', 'power', 'warranty', 'ancho', 'alto', 'largo', 'peso', 'description', 'urlFile', 'status'];

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }

    public function category()
    {
        return $this->belongsTo(CategoryProducts::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubcategoryProducts::class, 'subcategory_id');
    }

    //Al declararla como static se puede llamar sin instanciar la clase, es decir permite llamarla directamente, sin hacer en el controlador algo como $solarProducts = new SolarProducts();
    public static function getCategories()
    {
        // Obtiene las categorías distintas de los productos solares, comparando el id de la categoria, con el id de la categoria de la tabla category_products
        return CategoryProducts::whereIn(
            'id',
            //self selecciona sola la columna category_id de la tabla solar_products, y distinct elimina los duplicados
            //pluck devuelve un array con los valores de la columna category_id, como 1,2,3
            self::select('category_id')->distinct()->pluck('category_id')
        )->get();
    }

    public static function getSubcategories($categoryId)
    {
        return SubcategoryProducts::where('category_id', $categoryId)->get();
    }

    public static function getProducts($subcategoryId)
    {
        return self::where('subcategory_id', $subcategoryId)
            ->where('status', 1)
            ->get()
            ->unique('type') // 🔥 uno por cada tipo
            ->values(); // Reindexa la colección
    }
}
