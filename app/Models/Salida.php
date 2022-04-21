<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Salida extends Model
{
    use HasFactory;

     protected $fillable = [
        'Fecha','TipoComprobante', 'SerieComprobante', 'NumeroComprobante', 'Impuesto','Total','persona_id','user_id',
    ];
protected $dates = ['Fecha'];

protected function serializeDate(DateTimeInterface $date)
{
    return $date->format('Y/m/d');
}
     public function personas()
    {
    return $this->belongsTo('App\Models\Persona','persona_id');
    }

     public function users()
    {
    return $this->belongsTo('App\Models\User','user_id');
    }
public function productos()
    {
    return $this->belongsToMany('App\Models\Producto','salida_producto','salida_id','producto_id')->withPivot('precio','cantidad','monto');
    }


}
