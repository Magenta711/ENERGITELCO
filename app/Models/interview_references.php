<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class interview_references extends Model
{
    protected $table = "interview_references";
    protected $fillable = ['interview_id','company_r','date_r','name_r','service_time_r','concept_r','recommend'];
    protected $guarder = "id";
}
