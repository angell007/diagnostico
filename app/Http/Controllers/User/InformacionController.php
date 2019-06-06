<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Enfermedad;
use \Carbon\Carbon;

use Illuminate\Http\Request;

class InformacionController extends Controller
{
    public function show($enfermedad)
    {
        $enfermedad =  Enfermedad::find($enfermedad);
        return view('user.informacion', compact('enfermedad'));

    }

    public function imprimir($id){
        $enfermedad =  Enfermedad::find($id);
        $today = Carbon::now()->format('d/m/Y');
        $pdf = \PDF::loadView('user.reporte', compact('today','enfermedad'));
        return $pdf->download('reporte.pdf');
      }
}
