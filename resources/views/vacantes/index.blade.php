@extends('layouts.app')

@section('botones')

    <a href="{{route('vacantes.index')}}" class="btn btn-outline-dark">VER VACANTES</a>
    <a href="{{route('vacantes.create')}}" class="btn btn-outline-dark">NUEVA VACANTES</a>

@endsection


@section('content')



    <h1 class="text-center"> Administrar Vacantes</h1>
    @if (count($vacante) > 0)
    <div class="col-md-12 mx-auto bg-white p-4">



            <table class="table">
                <thead class="bg-primary text-ligth">
                    <tr>


                        <th scole="col">Titulo_Vacante </th>
                        <th scole="col">Categoria</th>
                        <th scole="col">Estado </th>
                        <th scole="col">Candidatos </th>

                        <th scole="col">Acciones </th>




                    </tr>


                </thead>
                <tbody>
                    @foreach ($vacante as $item)
                    <tr>
                        <td> {{$item->titulo}} </td>
                        <td> {{$item->categoria->nombre}} </td>




                    <td>
                        <componenteactivar

                            :activa="{{$item->activa}}"
                            :vacante-id="{{$item->id}}"


                        >

                    </componenteactivar>

                    </td>
                    <td>
                    <a href="{{route('candidatos.index',['id'=>$item->id])}}">
                        {{$item->candidatos->count()}} Candidatos

                        </a>


                    </td>
                    <td>
                        <a href="" class="btn btn-warning "><i class="fa fa-edit"></i>editar</a>
                        <eliminarvacante
                            :eliminarvacanteid="{{$item->id}}"

                        ></eliminarvacante>
                    <a href="{{route('vacantes.show', $item->id)}}" class="btn btn-success ">  <i class="far fa-eye"></i>Ver </a>



                    </td>

                    </tr>



                @endforeach



                </tbody>





        </table>




    </div>

    <div class="col-12 mt-4 justify-content-center">

        {{$vacante->links()}}



    </div>




    @else

    <p class="text-center mt-5 bg-warning text-dark"> no tienes vacantes</p>

    @endif



@endsection
