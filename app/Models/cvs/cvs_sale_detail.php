<?php

namespace App\Models\cvs;

use Illuminate\Database\Eloquent\Model;

class cvs_sale_detail extends Model
{
    protected $table = "cvs_sale_details";
    protected $fillable = ['sale_id','productable_type','productable_id','amount','total_value','type_sale','activation_type_id','value','payroll','activation_date'];
    protected $guarder = ['id'];    

    public function productable()
    {
        return $this->morphTo();
    }

    public function sale()
    {
        return $this->hasOne(cvs_sale::class, 'id','sale_id');
    }

    public function activation()
    {
        return $this->hasOne(cvs_activation_type::class, 'id', 'activation_type_id');
    }
}
