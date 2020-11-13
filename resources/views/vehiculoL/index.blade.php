@extends('layouts.plantilla') 
@section('contenido') 

<h1>Vehiculos
        
        <small></small>
      </h1>
<div class="row">
       <div class="col-md-8 col-xs-12">
       <h4>Ingrese la placa, el modelo o tipo de vehiculo para consultar:</h4>
            @include('vehiculoL.search')
            </div>
            <div class="col-md-2 ">
            <a href="Lista_vehiculo/create" class="pull-right">
                <button class="btn btn-success">Vehiculos</button>
                </a>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12"> 
            <div class="table-responsive">
            <table class="table table-striped table-hover"> 
                <thead>
                <th>Id</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Numero_identificacion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Tipo_vehiculo</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Opciones</th>
            </thead>
            <tbody>
            @foreach($vehiculoL as $sv)
            <tr>
            <td>{{$sv->id}}</td>
            <td>{{$sv->habitantes->nombres}}</td>
            <td>{{$sv->habitantes->apellidos}}</td>
            <td>{{$sv->habitantes->numero_identificacion}}</td>
            <td>{{$sv->habitantes->telefono}}</td>
            <td>{{$sv->habitantes->correo}}</td>
            <td>{{$sv->tipo_vehiculo}}</td>
            <td>{{$sv->modelo}}</td>
            <td>{{$sv->placa}}</td>
    <td>
    <a href="{{URL::action('Lista_VehiculoController@edit',$sv->id)}}"><button class="btn btn-primary">Actualizar</button></a>
    <a href="" data-target="#modal-delete-{{$sv->id}}"data-toggle="modal">
       <button class="btn btn-danger">Eliminar</button>
       </a>
    
           </td>
              </tr>
              @include('vehiculoL.modal')
                @endforeach
               </tbody>
           </table>
       </div>
       {{$vehiculoL->links()}}
    </div>
</div>

@endsection