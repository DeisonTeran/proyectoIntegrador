<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Detalle_factura;
use App\Factura;
use App\habitante;
use App\Tipo_cobro;
use Illuminate\Support\Facades\Redirect;

class Detalle_facturaController extends Controller
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

            $Detalle_factura = Detalle_factura::where('fecha', 'LIKE', '%' . $query . '%')
                ->join('tipo_cobros', 'tipo_cobros.id', '=', 'detalle_facturas.tipo_cobros_id')
                ->orwhere('tipo_cobro', 'LIKE', '%' . $query . '%')
                ->orderBy('facturas_id', 'DESC')->paginate(3);

            return view('multa.index', ["Detalle_factura" => $Detalle_factura, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $multa = Tipo_cobro::orderBy('id', 'DESC')
            ->select('tipo_cobros.id', 'tipo_cobros.tipo_cobro')
            ->get();
        return view('multa.create')->with('multa', $multa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_habitant = habitante::select('id')
            ->where('numero_identificacion', '=', $request->get('documento'))->first();
        $id_habitante = $id_habitant;

        if (strlen($id_habitante) == 0) {

            echo 'no registrado';
        } else {

            $profession = Factura::select('id')
                ->where('estado_factura', '=', 'no generada')
                ->where('habitantes_id', '=', $id_habitante->id)->first();
            $id_factura = $profession;


            if (strlen($id_factura) == 0) {

                echo 'no encontro factura con estado no generada se genera una';
                $factura = new Factura;
                $factura->habitantes_id = $id_habitante->id;
                $factura->valor_total = 0;
                $factura->estado_factura = 'no generada';
                $factura->save();

                $profession = Factura::select('id')
                    ->where('estado_factura', '=', 'no generada')
                    ->where('habitantes_id', '=', $id_habitante->id)->first();

                $id_factura = $profession;

                $detalle = new Detalle_factura;
                $detalle->facturas_id = $id_factura->id;
                $detalle->tipo_cobros_id = $request->get('multa');
                $detalle->fecha = $request->get('fecha');
                $detalle->save();
                return Redirect::to('multa');

            } else {
                echo $id_factura->id . ' ';
                echo 'si la encontro';

                $detalle = new Detalle_factura;
                $detalle->facturas_id = $id_factura->id;
                $detalle->tipo_cobros_id = $request->get('multa');
                $detalle->fecha = $request->get('fecha');
                $detalle->save();
                return Redirect::to('multa');
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
        $Detalle_factura = Detalle_factura::findOrFail($id);
        return view("multa.edit", ["Detalle_factura" => $Detalle_factura]);
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
        $detalle = new Detalle_factura;
        $detalle->tipo_cobros_id = $request->get('multa');
        $detalle->fecha = $request->get('fecha');
        $detalle->update();
        return Redirect::to('multa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalle_factura = Detalle_factura::findOrFail($id);
        $detalle_factura->delete();
        return Redirect::to('Lista_vehiculo');
    }
}
