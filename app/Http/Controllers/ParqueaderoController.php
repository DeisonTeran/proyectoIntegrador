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
                ->where('estado_ingreso', '=', $estado)
                ->orwhere('fecha', 'LIKE', '%' . $query . '%')
                ->orwhere('placa', 'LIKE', '%' . $query . '%')
                ->orwhere('modelo', 'LIKE', '%' . $query . '%')
                //->whereNotIn('estado_ingreso', [$estado])
                ->orderBy('parqueaderos.id', 'DESC')->paginate(6);
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
        return Redirect::to('parqueadero');
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

    public function ingresar($id)
    {
        echo 'ingresar';
        $sv = parqueadero::findOrFail($id);
        $sv->estado_ingreso = 'Salio/Ingreso';
        $sv->update();
        return Redirect::to('parqueadero');
    }
}
