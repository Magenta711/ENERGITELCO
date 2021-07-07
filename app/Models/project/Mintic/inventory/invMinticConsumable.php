<?php

namespace App\Models\project\Mintic\inventory;

use App\Models\project\Mintic\MinticConsumableImplementDetail;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvUser;

class invMinticConsumable extends Model
{
    protected $fillable = ['item','unid','amount','tickets','departures','stock','alert','status','type'];

    public function inventarybles()
    {
        return $this->morphMany(InvUser::class, 'inv_users');
    }

    public function productables()
    {
        return $this->morphMany(MinticConsumableImplementDetail::class, 'productable');
    }
}
