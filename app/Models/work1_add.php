<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class work1_add extends Model
{
    protected $table = "work1_adds";
    protected $fillable = [
        'work_id','f8a1','f8a2','f8a3','f8a4','f8a5',
        "f9a1u1","f9a1u2","f9a1u3","f9a2u1","f9a2u2","f9a2u3","f9a3u1","f9a3u2","f9a3u3",
        "ajustes_u1","ajustes_u2","ajustes_u3",'ajustes_u4',
        "discharges_u1","discharges_u2","discharges_u3",'discharges_u4',
        'f9a1u4','f9a2u4','f9a3u4','f2b1u4','f2b2u4','f2b3u4','f2b4u4','f2b5u4','f2b6u4','f2c1u4','f2c2u4','f2c4u4','f2c3u4','f6a1u4','f6a2u4','f6a3u4','f6a4u4','f6a5u4','foto_moto4',
        'pending_u1','pending_u2','pending_u3','pending_u4','deliverable_u1','deliverable_u2','deliverable_u3','deliverable_u4',
        'department','municipality','eb','lat','long'
    ];
    protected $guarder = ['id'];
}
