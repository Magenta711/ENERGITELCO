<?php

namespace App\Models\project\Mintic\inventory;

use App\Models\project\Mintic\MinticConsumableImplementDetail;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvUser;

class invMinticEquipment extends Model
{
    protected $fillable = ['serial','item','brand','status','commentary'];

    public function productables()
    {
        return $this->morphMany(MinticConsumableImplementDetail::class, 'productable');
    }

    public function inventarybles()
    {
        return $this->morphMany(InvUser::class, 'inv_users');
    }
}
