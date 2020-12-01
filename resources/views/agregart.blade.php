@extends('plantilla')

@section('content')
    
          {{--Fila Formulario--}}
          <div class="col-md-5">
              <h3 class="text-left mb-4">Turnos</h3>

              <form action="{{route('storet')}}" method="POST">
                  @csrf

                  <div class="form-group">
                      <input type="time" name="turno" id="turno" class="form-control" value="{{old('turno')}}" placeholder="Turno" >
                  </div>
                  @error('turno')
                      <div class="alert alert-danger">
                          El turno es requerido
                      </div>
                  @enderror
                  <div class="form-group">
                    <select name="estado" id="estado" class="form-control" value="{{old('estado')}}" placeholder="Estado">
                      <option selected>Activo</option>
                      <option>Inactivo</option>
                    </select>
                  </div>

                  @error('estado')
                  <div class="alert alert-danger">
                      El estado es requerida
                  </div>
                  @enderror
                  
                  <button type="submit" class="btn btn-success">Guardar</button>
                  
                </form>
              @if (session('registrart'))
                   <div class="alert alert-success mt-3">
                       {{session('registrart')}}
                   </div>   
              @endif
          </div>
          {{-- Fin Fila Formulario--}}
     </div>
     

@endsection
