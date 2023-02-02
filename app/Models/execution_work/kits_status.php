<?php

namespace App\Models\execution_work;

use Illuminate\Database\Eloquent\Model;

class kits_status extends Model
{
    protected $table = 'kits_status';
    protected $fillable = [
        'id',
        'estado'
    ];
}
