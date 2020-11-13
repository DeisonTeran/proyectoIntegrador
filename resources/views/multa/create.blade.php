@extends('layouts.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nueva multa</h3>
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
{!!Form::open(array('url'=>'multa','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="row">
    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br><label for="documento">Numero Documento del responsable a multar:</label>
            <input type="number" name="documento" id="documento" class="form-control" placeholder="Digite el número Documento">
        </div>

        <div class="form-group">

            <label for="multa">Tipo de multa:</label>
            <select name="multa" id="multa" class="form-control selectpicker" data-livesearch="true">
                <option value="" disabled selected>multas:</option>
                @foreach($multa as $tipo)
                <option value="{{$tipo->id}}">{{ $tipo->tipo_cobro }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="text" name="fecha" class="form-control" placeholder="Fecha Salida.." value="{{date('Y-m-d H:i:s') }}">
        </div>

        <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group"> <br>
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span>
                    Guardar</button>
                <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span>
                    Vaciar Campos</button>
                <a class="btn btn-info" type="reset" href="{{url('multa')}}"><span class="glyphicon 
glyphicon-home"></span>Regresar </a>
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    @endsection