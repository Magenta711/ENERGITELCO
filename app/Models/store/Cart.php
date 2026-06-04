<?php

namespace App\Models\store;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = ['client_id','products','total'];


    // public function clients(){
    //     return $this->hasOne(billboard_type::class, 'id', 'client_id');
    // }
}
