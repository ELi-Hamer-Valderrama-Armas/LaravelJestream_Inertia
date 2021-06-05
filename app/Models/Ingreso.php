<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

     protected $fillable = [
        'Fecha','TipoComprobante', 'SerieComprobante', 'NumeroComprobante', 'Impuesto','Total','persona_id','user_id',
    ];
     public function personas()
    {
    return $this->belongsTo('App\Models\Persona','persona_id');
    }

     public function users()
    {
    return $this->belongsTo('App\Models\User','user_id');
    }
public function producto()
    {
    return $this->belongsToMany('App\Models\Producto','producto_ingreso','ingreso_id','producto_id')->withPivot('precio','cantidad','monto');
    }

}
