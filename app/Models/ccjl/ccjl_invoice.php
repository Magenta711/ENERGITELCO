<?php

namespace App\Models\ccjl;

use Illuminate\Database\Eloquent\Model;

class ccjl_invoice extends Model
{
    protected $table = "ccjl_invoices";
    protected $fillable = ['rent_id','cod','month','expiration_date','total_pay','total','rest','plus','cash','qr','card','date_pay','token','status'];
    protected $guarder = ['id'];

    public function rent()
    {
        return $this->hasOne(ccjl_rents::class,'id','rent_id');
    }
}