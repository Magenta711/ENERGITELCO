<?php

namespace App\Models\project\Mintic\inventory;

use App\Models\project\Mintic\MinticConsumableImplementDetail;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvUser;
use App\Models\taskDetailConsumable;

class invMinticEquipment extends Model
{
    protected $fillable = ['serial','item','brand','status','commentary'];

    public function productables()
    {
        return $this->morphOne(MinticConsumableImplementDetail::class, 'productable');
    }

    public function inventarybles()
    {
        return $this->morphOne(taskDetailConsumable::class, 'inventaryble');
    }
}
