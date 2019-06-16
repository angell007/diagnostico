<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Enfermedad;
use App\Historial;
use \Carbon\Carbon;
use App\User;

// use Illuminate\Support\Facades\Auth;
use Auth;

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

    //   public function save($enfermedad)
    //   {
    //     $aux = Enfermedad::find($enfermedad);
    //         $historia = new \App\Historial;
    //         $historia->enfermedad_id = $aux->id ;
    //         $historia->user_id = Auth::user()->id;
    //         $historia->saveOrFail();
    //         return back()->with('succes_msg','Save successfully');

    //   }

      public function save($idEnfermedad)
    {

        // dd($enfermedad);

        // $aux = false ;
        // $enfermedad = Enfermedad::findOrFail($idEnfermedad);

        // foreach ($enfermedad->users as $key) {
        //     if($key->id == Auth::user()->id){
        //         $aux = true;
        //      }
        // }


        // if($aux == true) {
            // return response()->json([
            //     'flash_now' => ['danger', 'Sintoma not add Successfully!'],
            //     'dismiss_modal' => true,
            //     'reload_datatables' => true,
            //     ]);
        // }else{
                $enfermedad = Enfermedad::where('id', $idEnfermedad)->first();
                Auth::user()->enfermedades()->attach($enfermedad);
                return back()->with('succes_msg','Save successfully');
                // return response()->json([
                // 'flash_now' => ['info', 'Historial Add Successfully!'],
                // 'dismiss_modal' => true,
                // 'reload_datatables' => true,
                // ]);
        // }
    }
}
