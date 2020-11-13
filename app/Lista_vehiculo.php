<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista_vehiculo extends Model
{
    protected $fillable = ['id','tipo_vehiculo', 'modelo','placa'];
    public $timestamps = false;
    
    //Relacion con la tabla habitantes
    public function habitantes()
    {
        return $this->belongsTo('App\habitante');
    }

    //Relacion con la tabla parqueadero
    public function parqueaderos()
    {
        return $this->hasMany('App\parqueadero');
    }
}
