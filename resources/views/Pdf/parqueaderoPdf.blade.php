<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Parqueadero| Sistema Web</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Reporte de parqueadero</h3><img src="" alt="" width='100px'><br><br>
        <h1 class="text-center">Unidad residencial campo verde</h1>
        <h3 class="text-center">NIT: 123456-1</h3>
        <h3 class="text-center">Tel. 555555</h3><br> <br> <br>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>placa</th>
                <th>modelo</th>
                <th>fecha</th>
                <th>estado</th>

            </tr>@foreach($parqueadero as $pro)<tr>
                <td>ID: {{$pro->id}}</td>
                <td>{{$pro->placa}}</td>
                <td>{{$pro->modelo}}</td>
                <td>{{$pro->fecha}}</td>
                <td>{{$pro->estado_ingreso}}</td>
            </tr>@endforeach
        </table>
        <h5 class="text-center">Unidad residencial campo verde</h5>
        <h6>Software de Parqueaderos</h6>
    </div>
</body>

</html>