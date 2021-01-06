<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\nuevoCandidato;
use Illuminate\Auth\Events\Validated;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            // dd($request->route('id'));

             $vacante_id=$request->route('id');

               $candi= DB::table('candidatos')->where('vacante_id','=',$vacante_id)->get();

               // return dd($candi);

               return view('candidatos.index', compact('candi'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request;

        //guardar pdf


        $datos=$request->validate([
            'nombre'=>'required',
            'email'=>'required',
            'cv'=>'required|max:10000|mimes:doc,docx,pdf',
            'vacante_id'=> 'required'


        ]);




            $archivo=$request->file('cv');
            $nombreArchivo= time(). "." . $archivo->extension();
            $ubicacion= public_path('/storage/cv');
            $archivo->move($ubicacion, $nombreArchivo);

            //return $nombreArchivo;



        /*$candidatos= new Candidato();
        $candidatos->nombre=$datos['nombre'];
        $candidatos->email=$datos['email'];
        $candidatos->cv="123.pdf";
        $candidatos->vacante_id=$datos['vacante_id'];
        $candidatos->save();*/

           $vacante= Vacante::find($datos['vacante_id']);

            DB::table('candidatos')->insert([
                'nombre'=>$datos['nombre'],
                'email'=>$datos['email'],
                'cv'=>$nombreArchivo,
                'vacante_id'=>$datos['vacante_id']

            ]);

            //nuevo usuario registrado

            $reclutador= $vacante->usuario;
            $reclutador->notify( new nuevoCandidato($vacante->titulo, $vacante->id));






            return back()->with('estado', 'tus datos fueron enviados Correctamente');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
