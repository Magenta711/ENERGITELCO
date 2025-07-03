<?php

namespace App\Models\ClientsUsers;

use App\Models\store\Pay;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class Clients extends AuthenticatableUser
{
    protected $table = 'clients';

    protected $fillable = [
        'name',
        'email',
        'password',
        'locate',
        'number',
        'email_verified_at',
    ];


    public function compras()
    {
        return $this->hasMany(Pay::class, 'id_client', 'id')->where('status', 'APPROVED');
    }
}
