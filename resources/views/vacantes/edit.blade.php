@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />


@endsection


@section('botones')

<a href="{{route('vacantes.index')}}" class="btn btn-info">volver</a>

@endsection

@section('content')

    <h1 class="text-center">Editar Vacantes {{$vacante->titulo}}</h1>

    <div class="row justify-content-center mt-5">
        <form method="POST" enctype = "multipart/form-data" action="{{route('vacantes.update', $vacante->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="titulo">Titulo</label>

                        <input
                         type="text"
                         placeholder="ingresa el titulo"
                         class="form-control"
                         name="titulo"
                         id="titulo"
                        value="{{$vacante->titulo}}"

                        />


                        @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">

                           <strong>{{$message}} </strong>

                        </span>
                    @enderror
                </div>

                    <div class="form-group">
                        <label>Categoria </label>

                        <select
                        name="categoria"
                        class="form-control @error('categoria') is-invalid @enderror"
                        id="categoria"
                        required
                         >

                            <option disabled selected>Seleccionar </option>
                            @foreach ($categoria as  $cat)
                                <option value="{{$cat->id}}"
                                    {{$vacante->categoria_id==$cat->id ? 'selected' : ''}}
                                    >{{$cat->nombre}} </option>

                            @endforeach



                     </select>

                     @error('categoria')
                         <span class="invalid-feedback d-block" role="alert">

                            <strong>{{$message}} </strong>

                         </span>
                     @enderror



                      </div>


                    <div class="form-group">
                        <label id="experiencia"> Experiencia</label>
                        <select
                        name="experiencia"
                        class="form-control @error('experiencia') is-invalid @enderror"
                        id="experiencia"
                        required
                         >

                        <option disabled selected> Seleccionar</option>

                        @foreach ($experiencia as $item)

                    <option value="{{$item->id}}"
                        {{$vacante->experiencia_id==$item->id ? 'selected' : ''}}


                        >
                            {{$item->nombre}}
                    </option>

                        @endforeach

                    </select>

                    @error('experiencia')
                    <span class="invalid-feedback d-block" role="alert">

                       <strong>{{$message}} </strong>

                    </span>
                @enderror

                    </div>
                    <div class="form-group">
                        <label id="ubicacion">Ubicacion</label>
                        <select
                        name="ubicacion"
                        class="form-control @error('ubicacion') is-invalid @enderror"
                        id="ubicacion"

                         >

                        <option disabled selected> Seleccionar</option>

                        @foreach ($ubicacion as $item)

                    <option value="{{$item->id}}">
                        {{$vacante->ubicacion_id==$item->id ? 'selected' : ''}}
                            {{$item->nombre}}
                    </option>

                        @endforeach

                    </select>
                    @error('ubicacion')
                    <span class="invalid-feedback d-block" role="alert">

                       <strong>{{$message}} </strong>

                    </span>
                @enderror

                    </div>
                    <div class="form-group">
                        <label id="salario">Salario</label>
                        <select
                        name="salario"
                        class="form-control @error('salario') is-invalid @enderror"
                        id="salario"
                        required
                         >

                        <option disabled selected> Seleccionar</option>

                        @foreach ($salario as $item)

                    <option value="{{$item->id}}"
                        {{$vacante->salario_id==$item->id ? 'selected' : ''}}


                        >
                            {{$item->salario}}
                    </option>

                        @endforeach

                    </select>
                    @error('salario')
                    <span class="invalid-feedback d-block" role="alert">

                       <strong>{{$message}} </strong>

                    </span>
                @enderror
                    </div>
                    <div class="form-group">
                        <label> Descripcion</label>
                        <textarea
                        name="descripcion"
                        class="form-control"
                        rows="10" cols="50">

                        {{$vacante->descripcion}}


                        </textarea>

                        @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">

                           <strong>{{$message}} </strong>

                        </span>
                    @enderror


                    </div>
                    <div class="form-group">
                        <label> Imagen Vacante</label>

                        <div id="dropzoneDevJobs" class="dropzone form-control bg-gray-100 input-lg"></div>

                    <input type="hidden" name="imagen" id="imagen" value="{{$vacante->imagen}}"/>

                        @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">

                           <strong>{{$message}} </strong>

                        </span>
                    @enderror

                        <p id="error"></p>

                    </div>
                    <div class="form-group">
                        <label> Hablidades y conocimientos: </label>
                      @php
                          $skills=['HTML','JAVASCRIPT','CSS','flexbox','jQuery', 'Vue.js','React.js','php', 'Laravel', 'node.js'];
                      @endphp
                    <span class="mb-5">Elige al menos 3</span>
                      <habilidades-skill

                        :skills="{{ json_encode($skills)}}"
                        :oldskill="{{ json_encode($vacante->skill) }}"

                      >


                      </habilidades-skill>

                            @error('skills')
                            <span class="invalid-feedback d-block" role="alert">

                                <strong>{{$message}} </strong>

                            </span>
                            @enderror


                    </div>

                    <div class="form-group">


                            <input type="submit" class="btn btn-success mt-5 btn-block" value="Modificar">




                    </div>









            </form>




        </div>















@endsection

@section('script')


<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>


<script>




 Dropzone.autoDiscover = false;

 //DOMContentLoaded = cuando el archivo esta cargado

 document.addEventListener("DOMContentLoaded", () => {
         //Dropzone
        const dropzoneDevJobs= new Dropzone('#dropzoneDevJobs',{


            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

            url: "/vacantes/imagen",
            dictDefaultMessage:"Sube tu imagen aqui",
            //aceptar formato
            acceptedFiles:".png,.jpg,.jpeg,.gif,.bmp",
            //Sacar el ultimo archivo
            addRemoveLinks:true,
            //borrar archivo
            dictRemoveFile:"Borrar archivo",
            //Cantidad de archivos para Cargar
            maxFiles:1,


             method: "POST",

             data: {
                 '_token': $('input[name=_token]').val(),
                 'imagen': $('#dropzoneDevJobs').val(),
                },
                 dataType: "json",
                 //cuando se ejecute dropzone
                 init:function(){
                    if(document.querySelector("#imagen").value.trim()){
                        //console.log('imagen cargada');

                        //una vez que la imagen este cargada se guarda en la siguiente variable
                        const cargarimagen={};
                        //implementamos el metodo size para establecer el alto y ancho de la foto
                        cargarimagen.size= 1234;
                        //implementamos el nombre de la imagen
                        cargarimagen.name= document.querySelector('#imagen').value;

                        this.options.addedfile.call(this, cargarimagen);
                        this.options.thumbnail.call(this, cargarimagen ,`/storage/vancantes/${cargarimagen.name}`);

                        cargarimagen.previewElement.classList.add('dz-sucess');
                        cargarimagen.previewElement.classList.add('dz-complete');

                    }else{
                        //console.log('aca no hay imagen');
                    }
                 },
                 success: function(file,response) {
                    // console.log(response);
                     //console.log(file);
                    //console.log(response.correcto);
                     document.querySelector("#error").textContent="";

                     //coloca la respuesta del servidor de input hidden
                     document.querySelector("#imagen").value=response.correcto;

                     //añadir al objeto el nombre del servidor
                     file.nombreServidor= response.correcto;
                 },

                //logica de cantidad de archivos para Cargar
                maxfilesexceeded: function (file){


                    //informacion de los archivos subidos
                    //console.log(this.files);

                    if(this.files[1] != null){

                        this.removeFile(this.files[0]); //Elimina el archivo anterior
                        this.addFile(file); //Agrega el nuevo archivo
                    }


                },
                //Evento de los archivos eliminados
                removedfile: function(file,response){

                    file.previewElement.parentNode.removeChild(file.previewElement);
                    //console.log('el archivo borrado fue', file);





                    params ={
                        imagen: file.nombreServidor ?? document.querySelector('#imagen').value
                    }

                    axios.post('/vacantes/borrarimagen', params)
                        .then(respuesta => console.log(respuesta));
                }
             });


         })




</script>

@endsection
