<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parqueadero extends Model
{
    protected $fillable = ['id','fecha', 'estado_ingreso']; 

    public $timestamps = false;

    //Relacion con la tabla Lista_vehiculos
    public function lista_vehiculos()
    {
        return $this->belongsTo('App\Lista_vehiculo');
    }
}
