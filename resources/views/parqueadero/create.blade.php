@extends('layouts.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Reguistro de vehiculos al parqueadero</h3>
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
{!!Form::open(array('url'=>'parqueadero','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class="form-group">

      <label for="placa">Placa del vehiculo</label>
      <select name="placa" id="placa" class="form-control selectpicker" data-livesearch="true"
       >
       <option value="" disabled selected>Vehiculo:</option>
       @foreach($parqueadero as $vehiculo)
       <option value="{{$vehiculo->id}}">{{ $vehiculo->placa }}</option>
       @endforeach
       </select>
       </div>

    <div class="form-group">
      <label for="fecha">Fecha Salida</label>
      <input type="text" name="fecha" class="form-control" placeholder="Fecha Salida.." 
      value="{{date('Y-m-d H:i:s') }}">
      </div>
      <div class="form-group">
      <label for="estado">Estado</label>
      <select name="estado" id="estado" class="form-control selectpicker" data-livesearch="true" >
      <option value="" disabled selected>Opcion de Estado:</option>
      <option value="Ingreso">Ingreso</option>
      <option value="Salio">Salio</option>
      </select>
      </div>
      <div class="form-group">
      
       <div class="col-lg-11 col-md-6 col-sm-6 col-xs-12">
       <div class="form-group"> <br>
       <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> 
       Guardar</button>
       <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar 
       Campos</button>
       <a class="btn btn-info" type="reset" href="{{url('parqueadero')}}"><span class="glyphicon glyphicon-
       home"></span> Regresar </a>
                </div>
            </div>
        </div>
    {!!Form::close()!!}      
@endsection