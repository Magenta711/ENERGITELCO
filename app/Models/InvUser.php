<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class InvUser extends Model
{
    protected $fillable = ['user_id','inventaryble_id','inventaryble_type','tickets','departures','stock'];

    public function inventaryble()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function gastar($amount)
    {
        $this->update([
            'departures' => $this->departures + $amount,
            'stock' => $this->stock - $amount
        ]);
    }

    public function entrar($amount)
    {
        $this->update([
            'tickets' => $this->tickets + $amount,
            'stock' => $this->stock + $amount
        ]);
    }
    
    public function retroceso($amount)
    {
        $this->update([
            'departures' => $this->departures - $amount,
            'stock' => $this->stock + $amount
        ]);
    }

    public function devolver($amount)
    {
        $this->update([
            'tickets' => $this->tickets - $amount,
            'stock' => $this->stock - $amount
        ]);
    }
}
