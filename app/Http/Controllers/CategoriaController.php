<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //
    public function show(Categoria $categoria)
    {
        //dd($categoria);

        $vacantes= Vacante::where('categoria_id', '=', $categoria->id)->paginate(10);
        //dd($vacante);

        return view('categorias.show', compact('vacantes','categoria'));

    }
}
