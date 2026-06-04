<?php

namespace App\Models\human_management;

use Illuminate\Database\Eloquent\Model;

class PremiumUserDetail extends Model
{
    protected $fillable = ['premium_user_id','month','salary_month','extras_month','assistance_month'];
}
