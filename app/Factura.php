<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = ['valor_total', 'fecha_emision', 'fecha_vencimiento', 'estado_factura'];
    public $timestamps = false;

    //Relacion con la tabla lista_vehiculo 

    public function habitantes()
    {
        return $this->belongsTo('App\habitante');
    }

    //Relacion con la tabla detalle_facturas 

    public function detalle_facturas()
    {
        return $this->hasMany('App\Detalle_factura');
    }
}
