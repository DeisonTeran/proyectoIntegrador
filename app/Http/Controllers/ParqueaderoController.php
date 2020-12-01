<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\parqueadero;

use App\Lista_vehiculo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\ParqueaderoCreateRequest;

class ParqueaderoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $estado = "Salio";

            $parqueadero = parqueadero::join('lista_vehiculos', 'lista_vehiculos.id', '=', 'parqueaderos.lista_vehiculos_id')
                ->SELECT('parqueaderos.id', 'lista_vehiculos.placa', 'lista_vehiculos.modelo', 'parqueaderos.fecha', 'parqueaderos.estado_ingreso')

                ->orwhere('parqueaderos.fecha', 'LIKE', '%' . $query . '%')
                ->orwhere('lista_vehiculos.placa', 'LIKE', '%' . $query . '%')
                ->orwhere('lista_vehiculos.modelo', 'LIKE', '%' . $query . '%')
                ->orderBy('parqueaderos.id', 'DESC')->get();
            //dd($parqueadero);

            return view('parqueadero.index', ["parqueadero" => $parqueadero, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parqueadero = Lista_vehiculo::orderBy('id', 'DESC')
            ->select('Lista_vehiculos.id', 'Lista_vehiculos.placa')
            ->get();
        return view('parqueadero.create')->with('parqueadero', $parqueadero);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParqueaderoCreateRequest $request)
    {
        $query = trim($request->get('placa'));
        $parqueadero = new parqueadero;
        $parqueadero->lista_vehiculos_id = $request->get('placa');
        $parqueadero->fecha = $request->get('fecha');
        $parqueadero->estado_ingreso = 'Salio';
        $parqueadero->save();

        //return Redirect::to('parqueadero');
        echo '<script type="text/javascript">
        alert("Salida registrada");
        window.location.href="parqueadero";
            </script>';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parqueadero = parqueadero::findOrFail($id);
        return view("parqueadero.edit", ["parqueadero" => $parqueadero]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ingresar($id, $placa)
    {

        $sv = parqueadero::findOrFail($id);
        $sv->estado_ingreso = 'Salio-Ingreso';
        $sv->update();


        $id_vehi = Lista_vehiculo::select('id')
            ->where('placa', '=', $placa)->first();
        $id_vehicu = $id_vehi->id;

        $fecha = date('Y-m-d H:i:s');

        $parqueadero = new parqueadero;
        $parqueadero->lista_vehiculos_id = $id_vehicu;
        $parqueadero->fecha = $fecha;
        $parqueadero->estado_ingreso = 'Ingreso';
        $parqueadero->save();
        
        echo '<script type="text/javascript">
        alert("Ingreso registrado");
        window.location.assign("http://localhost:8000/parqueadero");
            </script>';
    }
}
