<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class Deliverable extends Model
{
    protected $table = "deliverables";
    protected $fillable = ['deliverable','state'];
    protected $guarder = ['id'];
}
