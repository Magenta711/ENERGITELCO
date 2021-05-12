<?php

namespace App\Models\project\Mintic\inventory;

use App\Models\project\Mintic\MinticConsumableImplementDetail;
use Illuminate\Database\Eloquent\Model;

class invMinticEquipment extends Model
{
    protected $fillable = ['serial','item','brand','status'];

    public function productables()
    {
        return $this->morphMany(MinticConsumableImplementDetail::class, 'productable');
    }
}
