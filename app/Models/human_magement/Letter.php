<?php

namespace App\Models\human_magement;

use App\Models\file;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    
    protected $fillable = ['responsable_id','register_id','type','data','date','status'];

    public function file()
    {
        return $this->morphOne(file::class, 'fileble');
    }
}
