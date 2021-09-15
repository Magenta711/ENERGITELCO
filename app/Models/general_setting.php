<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class general_setting extends Model
{
    protected $table = "general_settings";
    protected $fillable = ['name_app','nit','city','company','tel','address','email','state'];
    protected $guarder = ['id'];

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }
}