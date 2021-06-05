<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'TipoPersona','RazonSocial', 'TipoDocumento', 'NumeroDocumento', 'Nombres','Telefono', 'Email', 'Ciudad', 'Calle', 'Numero',
    ];
      public function ingresos()
    {
    return $this->hasMany('App\Models\Ingreso');
    }
}
