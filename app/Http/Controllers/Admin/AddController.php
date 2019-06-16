<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \App\Tratamiento;
use \App\Enfermedad;
use \App\Sintoma;

class AddController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTratamiento(Request $request, $idEnfermedad)
    {
        $aux = false ;
        $enfermedad = Enfermedad::find($idEnfermedad);
        $tratamiento = Tratamiento::where('name',request()->tratamiento_id)->first();
        foreach ($enfermedad->tratamientos as $key) {
            if( $key->pivot->tratamiento_id === $tratamiento->id){
                $aux = true;
             }
        }
        if($aux == true){
                return response()->json([
                'flash_now' => ['danger', 'Tratamiento not add Successfully!'],
                'dismiss_modal' => true,
                'reload_datatables' => true,
                ]);
            }else{
                Enfermedad::findOrFail($idEnfermedad)->tratamientos()->attach($tratamiento);
                    return response()->json([
                    'flash_now' => ['info', 'Tratamiento Add Successfully!'],
                    'dismiss_modal' => true,
                    'reload_datatables' => true,
                    ]);
            }

            $aux = false ;

    }

    public function addSintoma(Request $request, $idEnfermedad)
    {
        $aux = false ;
        $enfermedad = Enfermedad::findOrFail($idEnfermedad);

        foreach ($enfermedad->sintomas as $key) {
            if($key->name == request()->sintoma_id){
                $aux = true;
             }
        }


        if($aux == true) {
            return response()->json([
                'flash_now' => ['danger', 'Sintoma not add Successfully!'],
                'dismiss_modal' => true,
                'reload_datatables' => true,
                ]);
        }else{
                $sintoma = Sintoma::where('name',request()->sintoma_id)->first();
                Enfermedad::findOrFail($idEnfermedad)->sintomas()->attach($sintoma);
                return response()->json([
                'flash_now' => ['info', 'Sintoma Add Successfully!'],
                'dismiss_modal' => true,
                'reload_datatables' => true,
                ]);
        }
    }

    public function addSintomaModal($enfermedad)
    {
        $sintomas = Sintoma::all();
        return view('admin.enfermedads.addSintoma', compact('sintomas','enfermedad'));
    }

    public function addTratamientoModal($enfermedad)
    {
        $tratamientos = Tratamiento::all();
        return view('admin.enfermedads.addTmto', compact('tratamientos','enfermedad'));
    }


}
