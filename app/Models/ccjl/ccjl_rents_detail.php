<?php

namespace App\Models\ccjl;

use Illuminate\Database\Eloquent\Model;

class ccjl_rents_detail extends Model
{
    protected $table = "ccjl_rents_details";
    protected $fillable = ['rent_id','productable_type','month_rest','productable_id','months','total_value','value'];
    protected $guarder = ['id'];

    public function productable()
    {
        return $this->morphTo();
    }

    public function rent()
    {
        return $this->hasOne(ccjl_rents::class, 'id','sale_id');
    }
}
