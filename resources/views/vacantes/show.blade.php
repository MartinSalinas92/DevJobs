@extends('layouts.app')


@section('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" />

@endsection

@section('botones')

    <a href="{{route('vacantes.index')}}" class="btn btn-outline-dark">Volver vacantes</a>

@endsection




@section('content')

<h1 class="text-center"> hola world {{$vacante->titulo}}</h1>
    <div class="row">
        <div class="col-md-7 mt-5">

        <p><strong>Usuario:</strong>{{$vacante->usuario->name}}</p>

        <!--diffForHumans sirve para verificar la hora, o los dias que fue creado la vacante-->

        <p> <strong>Publicado:</strong> {{$vacante->created_at->diffForHumans()}}.  </p>

        <p><strong>Categoria:</strong>  {{$vacante->categoria->nombre}}.</p>

        <p><strong>Salario:</strong>  {{$vacante->salario->salario}}.</p>

        <h2 class="text-center mt-5"> Tecnologia y Conocimientos</h2>

        <br>


            @php
            $arraySkill=explode(",",$vacante->skill)
        @endphp

        @foreach ($arraySkill as $skill)




            <span

                class="border border-info px-10 py-10 py-3 rounded-circle mr-4"> {{$skill}}

        </span>








        @endforeach
        <br><br>
    <a href="/storage/vacantes/{{$vacante->imagen}}" data-lightbox="imagen" data-title="Vacante {{$vacante->titulo}}">

            <img src="/storage/vacantes/{{$vacante->imagen}}" class="mt-10 w-10 h-10">
            <div class="mt-5 mb-5">


        </a>


            {!! $vacante->descripcion !!}

        </div>




        </div>





        <div class="col-md-5 mt-5">

            @include('ui.caja')










        </div>



    </div>

@endsection
