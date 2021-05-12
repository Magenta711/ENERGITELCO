<?php

namespace App\Models\cvs\inventory;

use App\Models\cvs\cvs_sale_detail;
use Illuminate\Database\Eloquent\Model;

class cvs_inv_claro_service extends Model
{
    protected $table = "cvs_inv_claro_services";
    protected $fillable = ['cod','description','text','value','status'];
    protected $guarder = ['id'];

    public function productables()
    {
        return $this->morphMany(cvs_sale_detail::class, 'productable');
    }
    
}
