@extends('layouts.app')


@section('content')



        <div class="row" class="thumbnail" style="border:none; background:white;">



                <div class="col-sm-6 col-md-6 col-xs-12">
                    <h2>Encuentra un Trabajo remoto en tu pais</h2>

                    <p class="fs-1 fw-bold text-center mt-10"><strong style="color: #936;">Desarrollador/Diseñador Web</strong></p>

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
                                    <h5 class="card-header">{{$item->titulo}}</h5>
                                        <div class="card-body">

                                          <p class="card-text">
                                              Categoria: <span>
                                                {{$item->categoria->nombre}}</span> </p>

                                          <p class="card-text">
                                              Lugar: <span>
                                                {{$item->ubicacion->nombre}}
                                                </span> </p>

                                          <a href="/storage/cv/{{$item->cv}}" target="_blank" class="btn btn-danger"> Ver cv</a>
                                        </div>
                                      </div>

                            </li>

                        @endforeach


                    </ul>

                </div>




        </div>





@endsection
