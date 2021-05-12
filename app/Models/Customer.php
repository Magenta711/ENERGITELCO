<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $fillable = ['nit','name','email','tel','city','address','state'];
    protected $guarder = ['id'];
}
