<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class work6_add extends Model
{
    protected $table = "work6_adds";
    protected $fillable = ['work_id','f2a1','f2a2','f2a3','f2a4','f2a5','f2a6','f3a1','f3a2','f3a3','f3a4','f3a5','f4a1','f4a2','f4a3','f4a4','f4a5','deliverable_u1','deliverable_u2','deliverable_u3','deliverable_u4'];
    protected $guarder = ['id'];

    
}
