<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = "Quotes";
    
    protected $fillable = [
    'Nombre',
    'Corre', 
    'Correo',
    'Telefono',
    'CantidadKV',
    'ValorKV',
    'TotalConsumo',
    'Coordenadas',
    'Salva',
    'ValorTotal'];
}
