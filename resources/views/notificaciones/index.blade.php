@extends('layouts.app')

@section('botones')



<a href="{{route('vacantes.index')}}" class="btn btn-outline-dark">VER VACANTES</a>

@endsection


@section('content')

    <h1 class="text-center"> Hola notificaciones</h1>



        @if (count($notificaciones) > 0)

        @foreach ($notificaciones as $item)

        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
        <div class="card-header">Solicitud de candidato</div>
            <div class="card-body">
              <h5 class="card-title">{{$item->data['vacante']}}</h5>
              <p> te escribio hace : {{$item->created_at->diffForHumans()}}</p>
              <a href="{{route('candidatos.index', ['id'=>$item->data['id_vacante']])}}" class="btn btn-success"> Ver candidatos</a>



            </div>
          </div>

        @endforeach




        @else

            <p> no hay notificaciones</p>

        @endif
@endsection
