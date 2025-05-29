<?php

namespace App\Models\ClientsUsers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
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
}
