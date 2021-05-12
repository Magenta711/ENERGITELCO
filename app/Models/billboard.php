<?php

namespace App\Models;

use App\Models\billboard\billboard_type;
use App\User;
use Illuminate\Database\Eloquent\Model;

class billboard extends Model
{
    protected $table = "billboard";
    protected $fillable = ['name_document','document','responsable','type_billboard','estado'];
    protected $guarder = ['id'];
    
    public function type()
    {
        return $this->hasOne(billboard_type::class, 'id', 'type_billboard');
    }
    
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'responsable');
    }
    
}
