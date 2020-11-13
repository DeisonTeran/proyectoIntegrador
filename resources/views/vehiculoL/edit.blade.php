@extends('layouts.plantilla')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar datos del vehiculo</h3>
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
{{Form::open(array('action'=>array('Lista_VehiculoController@update',$sv->id),'method'=>'patch'))}}
<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
          <br><label for="documento">Numero Documento del propietario del vehiculo</label>
<input type="number"name="documento"id="documento"class="form-control"placeholder= "" value="{{$sv->habitantes->numero_identificacion}}" readonly>
        </div> 
      <div class="form-group">
      <label for="tipoVehi">tipo de vehiculo</label>
      <select name="tipoVehi" id="tipoVehi" class="form-control selectpicker" data-livesearch="true" required value="{{$sv->tipo_vehiculo}}">
      <?php 
      if($sv['tipo_vehiculo']=="Motocicleta"){

        echo '<option value="" >Opcion de vehiculo:</option>
        <option value="Motocicleta" selected>Motocicleta</option>
        <option value="Automovil">Automovil</option>';

      }else if($sv['tipo_vehiculo']=="Automovil"){

        echo '<option value="" >Opcion de vehiculo:</option>
        <option value="Motocicleta" >Motocicleta</option>
        <option value="Automovil" selected>Automovil</option>';

      }
      ?>

      </select>
      </div>

      <div class="form-group">
          <br><label for="modeloVehi">Modelo del vehiculo</label>
<input type="text"name="modeloVehi"id="modeloVehi"class="form-control"placeholder= "Digite el modelo del vehiculo" value="{{$sv->modelo}}">
        </div> 
        
        <div class="form-group">
          <br><label for="placaVehi">Placa del vehiculo</label>
<input type="text"name="placaVehi"id="placaVehi"class="form-control"placeholder= "Digite la placa del vehiculo" value="{{$sv->placa}}">
        </div> 
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group"><br>
            <button class="btn btn-primary"type="submit"><span class="glyphicon glyphicon-refresh">
            </span>Actualizar </button>
                <a class="btn btn-info"type="reset"href="{{url('Lista_vehiculo')}}"><span class="glyphicon glyphicon-home">
                </span>Regresar </a>
                                </div>
                            </div>
                        </div>
                    {!!Form::close()!!}      
                @endsection