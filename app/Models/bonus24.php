<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bonus24 extends Model
{
    protected $table = 'bonus24-7_reports';
    protected $fillable = ['user_id','status','date_start','date_end','description'];
}
