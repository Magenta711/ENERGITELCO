<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class SupplierEvaluation extends Model
{
    protected $table = "supplier_evaluations";
    protected $fillable = ['user_id','provider_id','token','provider_type','product','date','period','item_1','item_2','item_3','item_4','item_5','item_6','item_7','item_8','item_9','item_10','item_11','item_1_new','item_2_new','item_3_new','item_4_new','item_5_new','item_6_new','item_7_new','item_8_new','item_9_new','item_10_new','item_11_new','observations','comments','autovalue','state'];
    protected $guarder = ['id'];

    public function responsable()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function provider()
    {
        return $this->hasOne(Provider::class, 'id', 'provider_id');
    }

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }
}
