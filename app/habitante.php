<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class habitante extends Model
{
    protected $fillable = ['nombres', 'apellidos', 'tipo_documento', 'nuemro_identificacion', 'telefono', 'correo', 'fecha_registro'];
    public $timestamps = false;

    //Relacion con la tabla lista_vehiculo 

    public function lista_vehiculos()
    {
        return $this->hasOne('App\Lista_vehiculo');
    }

    //Relacion con la tabla lista_vehiculo 

    public function facturas()
    {
        return $this->hasMany('App\Factura');
    }
}
