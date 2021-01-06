@extends('layouts.app')

@section('botones')

<a href="{{route('vacantes.index')}}" class="btn btn-outline-dark">Volver</a>

@endsection


@section('content')

    <h1 class="text-center"> Hola world</h1>



    @foreach ($candi as $item)

    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
        <div class="card-header">Nombre</div>
            <div class="card-body">
              <h5 class="card-title">{{$item->nombre}}</h5>
              <p class="card-text">Tienes un nuevo candidato</p>
              <a href="/storage/cv/{{$item->cv}}" target="_blank" class="btn btn-danger"> Ver cv</a>
            </div>
          </div>

      @endforeach


@endsection
