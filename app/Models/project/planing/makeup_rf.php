<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class makeups_rf extends Model
{
    protected $table = "makeups_rf";
    protected $fillable = ['description','name','letter','state'];
    protected $guarder = ['id'];

    public function volteos()
    {
        return $this->hasMany(makeup_rf_cable::class, 'makeup_rf_id', 'id');
    }
}
