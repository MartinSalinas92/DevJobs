<form method="POST" action="{{route('vacantes.buscar')}}">

    @csrf

    <h2> Busqueda </h2>

    <div class="form-group">
        <label>Categoria </label>

        <select
        name="categoria"
        class="form-control @error('categoria') is-invalid @enderror"
        id="categoria"
        required
         >

            <option disabled selected>Seleccionar </option>
            @foreach ($categorias as  $cat)
                <option value="{{$cat->id}}"
                    {{old('categoria')==$cat->id ? 'selected' : ''}}
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
                <label id="ubicacion">Ubicacion</label>
                <select
                name="ubicacion"
                class="form-control @error('ubicacion') is-invalid @enderror"
                id="ubicacion"

                >

                <option disabled selected> Seleccionar</option>

                @foreach ($ubicacion as $item)

            <option value="{{$item->id}}">
                {{old('ubicacion')==$item->id ? 'selected' : ''}}
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

        <button type="submit" class="btn btn-primary btn-lg btn-block"> Buscar</button>
</form>
