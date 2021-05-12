<?php

namespace App\Models\cvs\inventory;

use App\Models\cvs\admin\cvs_sede;
use App\Models\cvs\cvs_sale_detail;
use Illuminate\Database\Eloquent\Model;

class cvs_inv_accesory extends Model
{
    protected $table = "cvs_inv_accesories";
    protected $fillable = ['cod','description','category_id','brand','value','sede_id','amount','status'];
    protected $guarder = ['id'];

    public function productables()
    {
        return $this->morphMany(cvs_sale_detail::class, 'productable');
    }

    public function category()
    {
        return $this->hasOne(cvs_inv_accesory_categories::class, 'id', 'category_id');
    }

    public function sede()
    {
        return $this->hasOne(cvs_sede::class, 'id', 'sede_id');
    }
}
