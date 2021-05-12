<?php

namespace App\Models\project\Mintic;

use Illuminate\Database\Eloquent\Model;

class MinticConsumableImplementDetail extends Model
{
    protected $fillable = [
        'productable_type',
        'productable_id',
        'implement_id',
        'amount',
        'delivered',
        'spent',
        'margin',
    ];


    public function productable()
    {
        return $this->morphTo();
    }
}
