@extends('plantilla')

@section('content')
    
          {{--Fila Formulario--}}
          <div class="col-md-5">
              <h3 class="text-left mb-4">Peliculas</h3>

              <form action="{{route('store')}}" method="POST" enctype="multipart/form-data"> 
                {{ csrf_field()}}

                  <div class="form-group">
                      <input type="tex" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre de la Pelicula" >
                  </div>
                  @error('nombre')
                      <div class="alert alert-danger">
                          El nombre es requerido
                      </div>
                  @enderror
                  <div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Fecha de Publicacion</div>
                      </div>
                        <input type="date" name="fechapublicacion" id="fechapublicacion" class="form-control" value="{{old('fechapublicacion')}}" placeholder="Fecha de Publicacion" >
                    </div>
                    <br>

                  @error('fechapublicacion')
                  <div class="alert alert-danger">
                      La fecha es requerida
                  </div>
                  @enderror


                  <div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Estado</div>
                      </div>
                    <select name="estado" id="estado" class="form-control" value="{{old('estado')}}">
                        <option value="">Seleccionar</option>
                        <option >Activo</option>
                      <option>Inactivo</option>
                    </select>
                  </div>
                  <br>

                @error('estado')
                <div class="alert alert-danger">
                    El estado es requerida
                </div>
                @enderror
                
                  <div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Turnos Disponibles</div>
                      </div>
                        <select class="form-control" name="turno" id="turno">
                            <option value ="">Seleccionar</option>
                          @foreach ($lista_turnos as $item)
                              <option value = "{{$item->turno}}">{{$item->turno}}</option>
                          @endforeach
                        </select>
                    </div>
                    <br>
                @error('turno')
                <div class="alert alert-danger">
                    El turno es requerida
                </div>
                @enderror
                <label for="Foto">{{'Foto'}}</label>
                <input type="file" name="Foto" id="Foto" value="">
                <br>
                <br>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </form>
              @if (session('agregar'))
                   <div class="alert alert-success mt-3">
                       {{session('agregar')}}
                   </div>   
              @endif

          </div>
          {{-- Fin Fila Formulario--}}
     </div>
     

@endsection
