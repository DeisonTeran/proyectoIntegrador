@extends('layouts.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Reguistro de vehiculos</h3>
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
{!!Form::open(array('url'=>'Lista_vehiculo','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
          <br><label for="documento">Numero Documento del propietario del vehiculo</label>
<input type="number"name="documento"id="documento"class="form-control"placeholder= "Digite el número Documento">
        </div> 
      <div class="form-group">
      <label for="tipoVehi">tipo de vehiculo</label>
      <select name="tipoVehi" id="tipoVehi" class="form-control selectpicker" data-livesearch="true" required>
      <option value="" disabled selected>Opcion de vehiculo:</option>
      <option value="Motocicleta">Motocicleta</option>
      <option value="Automovil">Automovil</option>
      </select>
      </div>

      <div class="form-group">
          <br><label for="modeloVehi">Modelo del vehiculo</label>
<input type="text"name="modeloVehi"id="modeloVehi"class="form-control"placeholder= "Digite el modelo del vehiculo">
        </div> 
        
        <div class="form-group">
          <br><label for="placaVehi">Placa del vehiculo</label>
<input type="text"name="placaVehi"id="placaVehi"class="form-control"placeholder= "Digite la placa del vehiculo">
        </div> 
      
       <div class="col-lg-11 col-md-6 col-sm-6 col-xs-12">
       <div class="form-group"> <br>
       <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> 
       Guardar</button>
       <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar 
       Campos</button>
       <a class="btn btn-info" type="reset" href="{{url('Lista_vehiculo')}}"><span class="glyphicon glyphicon-
       home"></span> Regresar </a>
                </div>
            </div>
        </div>
    {!!Form::close()!!}      
@endsection