<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PdfParqueaderoController extends Controller
{
    public function imprimirParqueadero(Request $request)
    {
        $parqueadero = DB::table('lista_vehiculos as lista')->join('parqueaderos as p', 'lista.id', '=', 'p.lista_vehiculos_id')
        ->select('lista.id','lista.placa', 'lista.modelo','p.fecha','p.estado_ingreso')->get();
        $pdf = \PDF::loadView('Pdf.parqueaderoPdf', ['parqueadero' => $parqueadero]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado de registros del parqueadero.pdf');
    }
}
