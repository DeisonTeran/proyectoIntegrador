@extends('layouts.plantilla')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar datos del parqueadero</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
{{Form::open(array('action'=>array('ParqueaderoController@update',$parqueadero->id),'method'=>'patch'))}}
<div class="form-group">
    <label for="id">Id</label>
    <input type="id" name="id" class="form-control" value="{{$parqueadero->lista_vehiculos_id}}">
</div>
<div class="form-group">
    <label for="placa">Placa del vehiculo</label>
    <input type="placa" name="placa" class="form-control" value="{{$parqueadero->lista_vehiculos->placa}}">
</div>

<div class="form-group">
    <label for="fecha">Fecha Salida</label>
    <input type="text" name="fecha" class="form-control" placeholder="Fecha Salida.." value="{{$parqueadero->fecha}}">
</div>
<div class="form-group">
    <label for="estado">Estado</label>
    <input type="estado" name="estado" class="form-control" value="Ingreso">
</div>
<div class="form-group">

    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group"><br>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh">
                </span>Actualizar </button>
            <a class="btn btn-info" type="reset" href="{{url('parqueadero')}}"><span class="glyphicon glyphicon-home">
                </span>Regresar </a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection