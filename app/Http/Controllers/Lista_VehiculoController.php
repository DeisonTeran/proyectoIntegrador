<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lista_vehiculo;

use App\habitante;
use Illuminate\Support\Facades\Redirect;

class Lista_VehiculoController extends Controller
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

            $vehiculoL = Lista_vehiculo::where('placa', 'LIKE', '%' . $query . '%')
                ->orwhere('modelo', 'LIKE', '%' . $query . '%')
                ->orwhere('tipo_vehiculo', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'DESC')->paginate(3);

            return view('vehiculoL.index', ["vehiculoL" => $vehiculoL, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculo = lista_vehiculo::orderBy('id', 'DESC')
            ->select('lista_vehiculos.placa', 'lista_vehiculos.id')
            ->get();
        return view('vehiculoL.create')->with('Lista_vehiculo', $vehiculo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query = trim($request->get('documento'));
        $placaVehi = $request->get('placaVehi');

        //validar que el propietario este registrado

        $profession = habitante::select('id')
            ->where('numero_identificacion', '=', $query)->first();

        $id_h = $profession;


        if (strlen($id_h) == 0) {

            echo '<script type="text/javascript">
              alert("Propietario no registrado en el sistema");
              window.location.href="Lista_vehiculo/create";
                  </script>';
        } else {

            //validar si es propietario ya posee un vehiculo registrado

            $id_vehiculo = lista_vehiculo::select('id')
                ->where('habitantes_id', '=', $id_h->id)->first();

            $id_vehi = $id_vehiculo;

            //validar si ya existe un vehiculo registrado con esa misma placa

            $profession = lista_vehiculo::select('placa')
                ->where('placa', '=', $placaVehi)
                ->orwhere('habitantes_id', 'not in', '(' . $id_h . ')')->first();

            $verificacion = $profession;

            if (strlen($verificacion) == 0) {

                if (strlen($id_vehi) == 0) {

                    $Lista = new lista_vehiculo;
                    $Lista->habitantes_id = $id_h->id;
                    $Lista->tipo_vehiculo = $request->get('tipoVehi');
                    $Lista->modelo = $request->get('modeloVehi');
                    $Lista->placa = $request->get('placaVehi');
                    $Lista->save();
                    return Redirect::to('Lista_vehiculo');
                } else {
                    echo '<script type="text/javascript">
                  alert("El propietario ya posee un vehiculo registrado");
                  window.location.href="Lista_vehiculo/create";
                      </script>';
                }
            } else {
                echo '<script type="text/javascript">
                  alert("Esta placa ya esta registrada en el sistema");
                  window.location.href="Lista_vehiculo/create";
                      </script>';
            }
        }
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
        $lista_vehiculos = lista_vehiculo::findOrFail($id);
        return view("vehiculoL.edit", ["sv" => $lista_vehiculos]);
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
        $query = $request->get('placaVehi');

        /**validar si ya existe un vehiculo registrado con esa misma placa

        $profession = lista_vehiculo::select('placa')
            ->where('placa', '=', $query)->get();

        $verificacion = $profession;

        echo $verificacion;
        echo ' '.$id;*/

            $sv = lista_vehiculo::findOrFail($id);

            $sv->tipo_vehiculo = $request->get('tipoVehi');

            $sv->modelo = $request->get('modeloVehi');

            $sv->placa = $request->get('placaVehi');

            $sv->update();

            return Redirect::to('Lista_vehiculo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = lista_vehiculo::findOrFail($id);
        $vehiculo->delete();
        return Redirect::to('Lista_vehiculo');
    }
}
