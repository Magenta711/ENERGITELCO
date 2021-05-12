<?php

namespace App\Models\project\Mintic\inventory;

use App\Models\project\Mintic\MinticConsumableImplementDetail;
use Illuminate\Database\Eloquent\Model;

class invMinticConsumable extends Model
{
    protected $fillable = ['item','unid','amount','alert','status','type'];

    public function productables()
    {
        return $this->morphMany(MinticConsumableImplementDetail::class, 'productable');
    }
}
