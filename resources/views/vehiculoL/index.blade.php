@extends('layouts.plantilla') 
@section('contenido') 

<h1>Vehiculos
        
        <small></small>
      </h1>
<div class="row">
       <div class="col-md-8 col-xs-12">
       <h4></h4>
            @include('vehiculoL.search')
            </div>
            <div class="col-md-2 ">
            <a href="Lista_vehiculo/create" class="pull-right">
                <button class="btn btn-success">Registrar vehiculos</button>
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
                <th>Numero identificacion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Tipo vehiculo</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Opciones</th>
            </thead>
            <tbody>
            @foreach($vehiculoL as $sv)
            <tr>
            <td>{{$sv->id}}</td>
            <td>{{$sv->nombres}}</td>
            <td>{{$sv->apellidos}}</td>
            <td>{{$sv->numero_identificacion}}</td>
            <td>{{$sv->telefono}}</td>
            <td>{{$sv->correo}}</td>
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