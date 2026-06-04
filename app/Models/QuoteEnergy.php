<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteEnergy extends Model
{
    protected $table = "quote_energies";

    protected $fillable = [
        'name',
        'Correo',
        'valorTotal',
        'visita',
        'name_file',];
}
