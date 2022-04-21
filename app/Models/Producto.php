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
    return $this->belongsToMany('App\Models\Ingreso','producto_ingreso','ingreso_id','producto_id')->withPivot('precio','cantidad','monto');
    }

        public function salidas()
    {
    return $this->belongsToMany('App\Models\Salida','salida_producto','salida_id','producto_id')->withPivot('precio','cantidad','monto');
    }
    
}
