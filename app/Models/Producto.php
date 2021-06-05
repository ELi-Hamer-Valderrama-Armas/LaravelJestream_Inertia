<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre', 'Stock', 'UnidadMedida', 'PrecioVenta','categoria_id',
    ];
     public function categorias()
    {
    return $this->belongsTo('App\Models\Categoria','categoria_id');
    }
    public function ingresos()
    {
    return $this->belongsToMany('App\Models\Ingreso','producto_ingreso','producto_id','ingreso_id')->withPivot('precio','cantidad','monto');
    }
}
