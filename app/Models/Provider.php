<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = "providers";
    protected $fillable = ['nit','name','email','tel','city','address','type_id','state'];
    protected $guarder = ['id'];

    public function type_provider()
    {
        return $this->hasOne(TypeProvider::class, 'id', 'type_id');
    }
}
