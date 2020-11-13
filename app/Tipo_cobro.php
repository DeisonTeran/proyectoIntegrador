<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_cobro extends Model
{
    protected $fillable = ['tipo_cobro', 'descripcion', 'valor'];
    public $timestamps = false;

    //Relacion con la tabla detalle_facturas 

    public function detalle_facturas()
    {
        return $this->hasMany('App\Detalle_factura');
    }
}
