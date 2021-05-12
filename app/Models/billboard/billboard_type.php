<?php

namespace App\Models\billboard;

use App\Models\billboard;
use Illuminate\Database\Eloquent\Model;

class billboard_type extends Model
{
    protected $table = "billboard_types";
    protected $fillable = ['name','status'];
    protected $guarder = ['id'];

    public function documents()
    {
        return $this->hasMany(billboard::class,'type_billboard','id');
    }
}
