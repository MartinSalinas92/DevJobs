<?php

namespace App\Http\Controllers;

use App\Models\Salario;
use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id= Auth::user()->id;

        $vacantes= Vacante::where('user_id',$user_id)->paginate(3);

        //return $vacante;
        return view('vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categoria= Categoria::all();
        $experiencia= Experiencia::all();
        $ubicacion= Ubicacion::all();
        $salario= Salario::all();

        //return dd($categoria);
        return view('vacantes.create', compact('categoria', 'experiencia', 'ubicacion', 'salario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Developer=$request->validate([

            'titulo'=>'required|min:10',
            'categoria'=>'required',
            'experiencia'=>'required',
            'ubicacion'=>'required',
            'salario'=>'required',
            'descripcion'=>'required|min:50',
            'imagen'=>'required',
            'skills'=>'required',

        ]);

        //return $Developer;

        //ALMACENAR EN LA BASE DE DATOS
        DB::table('vacantes')->insert([
            'titulo'=>$Developer['titulo'],
            'imagen'=>$Developer['imagen'],
            'skill'=>$Developer['skills'],
            'descripcion'=>$Developer['descripcion'],
            'categoria_id'=>$Developer['categoria'],
            'experiencia_id'=>$Developer['experiencia'],
            'ubicacion_id'=>$Developer['ubicacion'],
            'salario_id'=>$Developer['salario'],
            'user_id'=>Auth::user()->id

        ]);

        return view('vacantes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        //return $vacante;




        return view('vacantes.show', compact('vacante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {

        $this->authorize('view',$vacante);
        $categoria= Categoria::all();
        $experiencia= Experiencia::all();
        $ubicacion= Ubicacion::all();
        $salario= Salario::all();

        //return dd($categoria);
        return view('vacantes.edit', compact('categoria', 'experiencia', 'ubicacion', 'salario','vacante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
       //return $request->all();

       $this->authorize('update',$vacante);

       $data=$request->validate([


        'titulo'=>'required|min:10',
        'categoria'=>'required',
        'experiencia'=>'required',
        'ubicacion'=>'required',
        'salario'=>'required',
        'descripcion'=>'required|min:50',
        'imagen'=>'required',
        'skills'=>'required',


       ]);

        $vacante->titulo=$data['titulo'];
        $vacante->categoria_id=$data['categoria'];
        $vacante->experiencia_id=$data['experiencia'];
        $vacante->ubicacion_id=$data['ubicacion'];
        $vacante->salario_id=$data['salario'];
        $vacante->descripcion=$data['descripcion'];
        $vacante->imagen=$data['imagen'];
        $vacante->skill=$data['skills'];
        $vacante->save();


        return view('vacantes.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante, Request $request)
    {

        $this->authorize('delete',$vacante);



        $vacante->delete();
        return response()->json(['mensaje'=> 'Se ha eliminado la vacante '. $vacante->titulo]);
    }



    public function imagen(Request $request){

      $imagen= $request->file('file');

      $nombreimagen= time(). '.' . $imagen->extension();

      //return $nombreimagen;

      //Guarda en la carpeta storage
      $imagen->move(public_path('storage/vacantes'), $nombreimagen);

       return response()->json(['correcto'=>$nombreimagen]);



    }

    public function borrar(Request $request){
        if ($request->ajax()) {

            $imagen= $request->get('imagen');

            //borra la imagen de la carpeta Storage

            if (File::exists('storage/vacantes/'.$imagen)) {
                File::delete('storage/vacantes/'.$imagen);


            }

            return response('imagen eliminada',200);
        }
    }

    public function EstadoVacante(Request $request,Vacante $vacante){

        //Leer nuevo estado y asignarlo

        $vacante->activa= $request->data;


        //Guardarlo en la BD
        $vacante->save();

         return response()->json(['respuesta'=> 'Correcto']);


    }

    public function buscar(Request $request){
        //return 'buscando...';

       // return $request->all();

       $data=$request->validate([
           'categoria'=>'required',
           'ubicacion'=>'required'


       ]);

       $Busquedavacante=Vacante::where([
            'categoria_id' =>$data['categoria'],
            'ubicacion_id'=> $data['ubicacion']

       ])->get();

       //return $Busquedavacante;

       return view('busqueda.index', compact('Busquedavacante'));
    }

    public function resultado(){
        return 'resultado';
    }
}
