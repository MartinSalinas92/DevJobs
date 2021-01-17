<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //latest mostrar la ultima vacantes ingresadas
        //take mostrar todas las ultimas 10
        $vacantes= Vacante::latest()->where('activa', '=', '0')->take(10)->get();
        $ubicacion=Ubicacion::all();

        //dd($vacantes);

        return view('inicio.index', compact('vacantes','ubicacion'));
    }
}
