@extends('layouts.plantilla')
@section('contenido')

<h1>Parqueadero

    <small></small>
</h1>
<div class="row">
    <div class="col-md-8 col-xs-12">
        <h4>Ingrese la placa, fecha de registro, estado o el modelo para consultar:</h4>
        @include('parqueadero.search')
    </div>
    <div class="col-md-3 ">
        <a href="parqueadero/create" class="pull-right">
            <button class="btn btn-success">Registrar salida del parqueadero</button>
        </a>
    </div>

</div>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Id</th>
                    <th>Placa</th>
                    <th>modelo</th>
                    <th>Fecha</th>
                    <th>Estado</th>

                </thead>
                <tbody>
                    @foreach($parqueadero as $Parqueaderos)
                    <tr>
                        <td>{{$Parqueaderos->id}}</td>
                        <td>{{$Parqueaderos->placa}}</td>
                        <td>{{$Parqueaderos->modelo}}</td>
                        <td>{{$Parqueaderos->fecha}}</td>
                        <td>{{$Parqueaderos->estado_ingreso }}</td>
                        <td>
                            <a href="{{route('ingresar', [$Parqueaderos->id])}}" >
                                <button class="btn btn-danger">Ingresar</button>
                            </a>
                        </td>
                    </tr>
                    @include('parqueadero.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$parqueadero->links()}}
    </div>
</div>

@endsection