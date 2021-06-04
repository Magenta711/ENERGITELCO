<?php

namespace App\Models\human_magement;

use Illuminate\Database\Eloquent\Model;

class improvementActionDetail extends Model
{
    protected $fillable = ['text','start_date','end_date','type'];
}
