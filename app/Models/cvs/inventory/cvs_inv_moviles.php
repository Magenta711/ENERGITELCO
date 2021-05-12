<?php

namespace App\Models\cvs\inventory;

use App\Models\cvs\admin\cvs_sede;
use App\Models\cvs\cvs_sale_detail;
use Illuminate\Database\Eloquent\Model;

class cvs_inv_moviles extends Model
{
    protected $table = "cvs_inv_moviles";
    protected $fillable = ['cod','description','brand','family','modelo','value','iva','date','icc_id','sim_id','postpaid_date','activation_date','payroll','sede_id','status'];
    protected $guarder = ['id'];

    public function sede()
    {
        return $this->hasOne(cvs_sede::class,'id','sede_id');
    }

    public function productables()
    {
        return $this->morphMany(cvs_sale_detail::class, 'productable');
    }
}