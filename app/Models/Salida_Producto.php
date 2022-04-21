<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_Ingreso extends Model
{
    use HasFactory;

     protected $fillable = [
        'producto_id','salida_id', 'precio', 'cantidad', 'monto'   ];
 
}
