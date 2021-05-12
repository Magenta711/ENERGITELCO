<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class PaymentLimit extends Model
{
    protected $table = "payment_limits";
    protected $fillable = ['description_time','state'];
    protected $guarder = ['id'];
}
