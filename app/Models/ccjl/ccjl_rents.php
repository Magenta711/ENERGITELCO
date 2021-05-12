<?php

namespace App\Models\ccjl;

use Illuminate\Database\Eloquent\Model;

class ccjl_rents extends Model
{
    protected $table = "ccjl_rents";
    protected $fillable = ['client_id','user_id','total','total_months','date_start','date_end','status'];
    protected $guarder = ['id'];

    public function client()
    {
        return $this->hasOne(ccjl_clients::class, 'id','client_id');
    }

    public function details()
    {
        return $this->hasMany(ccjl_rents_detail::class, 'rent_id', 'id');
    }

    public function invoices()
    {
        return $this->hasMany(ccjl_invoice::class,'rent_id','id');
    }

    public function statusCheck()
    {
        $invoice = ccjl_invoice::where('rent_id',$this->id)->where('status',0)->first();
        if ($invoice) {
            if ($invoice->expiration_date < now()) {
                $resp = "Pendiente";
            }else {
                $resp = "Al día";
            }
        }else {
            $resp = "Finalizado";
        }
        return $resp;
    }

    public function invoicesPay()
    {
        return ccjl_invoice::where('rent_id',$this->id)->where('status',1)->get();
    }
}
