@extends('layouts.app')

@section('navegacion')

    @include('ui.categoria')

@endsection

@section('content')



        <div class="row" class="thumbnail" style="border:none; background:white;">



                <div class="col-sm-6 col-md-6 col-xs-12">
                    <h1>Encuentra un Trabajo remoto en tu pais</h1>

                    <p class="fs-1 fw-bold text-center mt-10"><strong style="color: #936;">Desarrollador/Diseñador Web</strong></p>


                    @include('ui.buscador')
                </div>





                    <div class="col-sm-6 col-md-6 col-xs-12 image-container{text-align:center}">

                        <img src={{asset('img/4321.jpg')}} alt="devjobs" style="height:300px; margin-left:-15px;" >

                    </div>


                </div>


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




        </div>





@endsection
