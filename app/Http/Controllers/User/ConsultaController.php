<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Consulta;
use App\Sintoma;
use App\Enfermedad;

class ConsultaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:User']);
    }

    public function index()
    {
        $sintomas = Sintoma::all();

        return view('user.consultas.index', compact('sintomas'));
    }

    public function createModal()
    {
        return view('user.consultas.create');
    }

    public function create()
    {
        $sintomas = Sintoma::all();
        if(isset(request()->s1)){
            $enfermedades = Enfermedad::whereHas('sintomas', function($q){
            $aux1 =     Sintoma::where('name',request()->s1)->first();
            $q->where('name', $aux1->name);

            })->whereHas('sintomas', function($q) {

            if(isset(request()->s2)){
            $aux2 =     Sintoma::where('name',request()->s2)->first();
            $q->where('name', $aux2->name);
            }

            })->whereHas('sintomas', function($q) {

            if(isset(request()->s3)){
            $aux3 =     Sintoma::where('name',request()->s3)->first();
            $q->where('name', $aux3->name);
            }
            })->get();
        }
        return view('user.consultas.index', compact('enfermedades','sintomas'));
    }


    // public function show($enfermedad)
    // {
    //     return 'hola';
    // }

}
