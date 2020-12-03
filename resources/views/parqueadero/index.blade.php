@extends('layouts.plantilla')
@section('contenido')

<h1>Parqueadero

    <small></small>
</h1>
<div class="row">
    <div class="col-md-8 col-xs-12">
    <h4>Reporte de reguistros del parqueadero <a href="\imprimirParqueadero"><button class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a></h4>
    <br>
        <h4>Ingrese la placa, fecha de registro o el modelo para consultar:</h4>
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
                    
                    <th>Placa</th>
                    <th>modelo</th>
                    <th>Fecha</th>
                    <th>Estado</th>

                </thead>
                <tbody>
                    @foreach($parqueadero as $Parqueaderos)

                    @if($Parqueaderos->estado_ingreso == 'Salio')
                    <tr>
                        
                        <td>{{$Parqueaderos->placa}}</td>
                        <td>{{$Parqueaderos->modelo}}</td>
                        <td>{{$Parqueaderos->fecha}}</td>
                        <td>{{$Parqueaderos->estado_ingreso }}</td>
                        <td>
                            <a href="{{route('ingresar', [$Parqueaderos->id,$Parqueaderos->placa])}}" >
                                <button class="btn btn-primary">Ingresar</button>
                            </a>
                        </td>
                    </tr>
                    @include('parqueadero.modal')
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>

@endsection