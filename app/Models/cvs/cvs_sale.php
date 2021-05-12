<?php

namespace App\Models\cvs;

use App\Models\cvs\admin\cvs_sede;
use App\Models\file;
use App\User;
use Illuminate\Database\Eloquent\Model;

class cvs_sale extends Model
{
    protected $table = "cvs_sales";
    protected $fillable = ['client_id','user_id','cashier_id','sede_id','sale_date','expiration_date','cod_invoice','token','cash','cash_value','qr','qr_value','card','card_value','total','commentary','status'];
    protected $guarder = ['id'];

    public function client()
    {
        return $this->hasOne(cvs_client::class,'id','client_id');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function cashier()
    {
        return $this->hasOne(User::class,'id','cashier_id');
    }
    public function sede()
    {
        return $this->hasOne(cvs_sede::class,'id','sede_id');
    }

    public function details()
    {
        return $this->hasMany(cvs_sale_detail::class, 'sale_id','id');
    }

    public function file()
    {
        return $this->morphOne(file::class, 'fileble');
    }
}
