@extends('layouts.plantilla')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar multas</h3>
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
{{Form::open(array('action'=>array('Detalle_facturaController@update', $Detalle_factura->id),'method'=>'patch'))}}
<div class="row">
    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br><label for="documento">Numero Documento del responsable a multar</label>
            <input type="number" name="documento" id="documento" class="form-control" value="{{$Detalle_factura->facturas->habitantes->numero_identificacion}}">
        </div>

        <div class="form-group">

            <label for="multa">Tipo de multa:</label>
            <select name="multa" id="multa" class="form-control selectpicker" data-livesearch="true">
                <option value="{{$Detalle_factura->tipo_cobros->id}}" selected>{{$Detalle_factura->tipo_cobros->tipo_cobro}}</option>
                @foreach($tipo_cobros as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->tipo_cobro}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha Salida</label>
            <input type="text" name="fecha" class="form-control" placeholder="Fecha Salida.." value="{{date('Y-m-d H:i:s') }}">
        </div>

            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group"><br>
            <button class="btn btn-primary"type="submit"><span class="glyphicon glyphicon-refresh">
            </span>Actualizar </button>
                <a class="btn btn-info"type="reset"href="{{url('multa')}}"><span class="glyphicon glyphicon-home">
                </span>Regresar </a>
                                </div>
                            </div>
                        </div>
                    {!!Form::close()!!}      
                @endsection