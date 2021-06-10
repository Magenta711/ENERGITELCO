<?php

namespace App\Models\human_magement;

use Illuminate\Database\Eloquent\Model;

class improvementActionDetail extends Model
{
    protected $fillable = ['improvement_id','text','start_date','end_date','type','status'];

    public function users()
    {
        return $this->hasMany(improvementActionDetailUser::class,'detail_id','id');
    }
}
