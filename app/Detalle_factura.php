<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_factura extends Model
{
    protected $fillable = ['fecha'];
    public $timestamps = false;

    //Relacion con la tabla facturas 

    public function facturas()
    {
        return $this->belongsTo('App\Factura');
    }

    //Relacion con la tabla facturas 

    public function tipo_cobros()
    {
        return $this->belongsTo('App\Tipo_cobro');
    }
}
