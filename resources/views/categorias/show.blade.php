@extends('layouts.app')

@section('content')

    <h1 class="text-center"> {{$categoria->nombre}}</h1>

    <div class="thumbnail mt-5" style="border:none; background:black;">

        <h1 class="text-center text-white"> Nuevas <span class="font-bold"> Vacantes</span> </h1>

        <ul class="row">
            @foreach ($vacantes as $item)

                <li class="text-white col-4">
                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                        <h5 class="card-header font-weight-bold">{{$item->titulo}}</h5>
                            <div class="card-body">

                              <p class="card-text">
                                  Categoria: <span>
                                    {{$item->categoria->nombre}}</span> </p>

                              <p class="card-text">
                                  Ubicacion: <span>
                                    {{$item->ubicacion->nombre}}
                                    </span> </p>
                              <p class="card-text">
                                  Experiencia: <span>
                                    {{$item->experiencia->nombre}}
                                    </span> </p>

                              <a href="{{route('vacantes.show', $item->id)}}"  class="btn btn-danger"> Ver Vacante</a>
                            </div>
                          </div>

                </li>

            @endforeach


        </ul>

    </div>

@endsection
