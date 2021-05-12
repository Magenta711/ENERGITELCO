<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class CustomerSatisfaction extends Model
{
    protected $table = "customer_satisfactions";
    protected $fillable = ['user_id','customer_id','token','email_company','name_company','official','position_official','dependence','date','period','item_1','item_2','item_3','item_4','item_5','item_6','item_7','item_8','comments','state'];
    protected $guarder = ['id'];
    
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
