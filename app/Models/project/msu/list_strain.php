<?php

namespace App\Models\project\msu;

use Illuminate\Database\Eloquent\Model;

class list_strain extends Model
{
    protected $table = 'list_strains';

    protected $fillable = [
        'name',
        'type'
    ];
}
