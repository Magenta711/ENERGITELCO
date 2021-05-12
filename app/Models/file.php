<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    protected $table = "files";
    protected $fillable = ['name','description','commentary','fileble_type','fileble_id','size','type','url','state'];
    protected $guarder = ['id'];

    public function fileble()
    {
        return $this->morphTo();
    }
}
