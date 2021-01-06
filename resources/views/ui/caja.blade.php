<div class="row justify-content-center mt-5 bg-dark text-white ">
    <form method="POST" enctype = "multipart/form-data" action="{{route('candidatos.store')}}">
            @csrf
            <h1>Contacta al Reclutador</h1>
            <div class="form-group">
                <label for="nombre">Nombre</label>

                    <input
                     type="text"
                     placeholder="ingresa el titulo"
                     class="form-control"
                     name="nombre"
                     id="nombre"
                    value="{{old('nombre')}}"

                    />


                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">

                       <strong>{{$message}} </strong>

                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">email</label>

                    <input
                     type="text"
                     placeholder="martinsalinass92@gmail.com"
                     class="form-control"
                     name="email"
                     id="email"
                    value="{{old('email')}}"

                    />


                    @error('email')
                    <span class="invalid-feedback d-block" role="alert">

                       <strong>{{$message}} </strong>

                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="cv">Agregar CV</label>

                    <input
                     type="file"

                     class="form-control"
                     name="cv"
                     id="cv"
                    value="{{old('cv')}}"

                    />


                    @error('cv')
                    <span class="invalid-feedback d-block" role="alert">

                       <strong>{{$message}} </strong>

                    </span>
                @enderror
            </div>

        <div class="form-group">

            <input type="hidden" name="vacante_id" value="{{$vacante->id}}"/>


        </div>


        <div class="form-group">

            <input type="submit" class="form-control bg-info uppercase" value="contactar">

        </div>







        </form>




    </div>
