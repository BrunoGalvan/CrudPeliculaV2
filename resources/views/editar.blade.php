@extends('plantilla')

@section('content')
<div class="col-md-5">
    <h3 class="text-left mb-3 pt-3">Editar la Pelicula ID : {{$peliculaActualizar->id}}</h3>
    <form action="{{route('update' , $peliculaActualizar->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        {{ csrf_field()}}
        <div class="form-group">
            <input type="text" name="nombre" id="nombre" value="{{$peliculaActualizar->nombre}}" class="form-control">
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
            <input type="date" name="fechapublicacion" id="fechapublicacion" value="{{$peliculaActualizar->fechapublicacion}}" class="form-control">
        </div>
        <br>
        @error('fechapublicacion')
        <div class="alert alert-danger">
            La fecha es requerida
        </div>
        @enderror
        <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">Estado</div>
            </div>
            <select name="estado" id="estado" class="form-control">
              <option>{{$peliculaActualizar->estado}}</option>
              @if ($peliculaActualizar->estado == 'Activo')
              <option>Inactivo</option>
              @else
              <option>Activo</option>
              @endif
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
                    <option name="turno" id="turno" >{{$peliculaActualizar->turno}}</option>
                  @foreach ($lista_turnos as $item)
                      <option name="turno" id="turno" >{{$item->turno}}</option>
                  @endforeach
                </select>
            </div>
            <br>
<di>
            <img src="{{ asset('storage').'/'.$peliculaActualizar->foto}}" alt="" width="200" >
</di>
<br>
<br>
             <label for="foto">{{'foto'}}</label>
                <input type="file" name="foto" id="foto" value="$peliculaActualizar->foto">
                <br>
                <br>


                @error('turno')
                <div class="alert alert-danger">
                    El turno es requerida
                </div>
                @enderror
        <button type="submit" class="btn btn-warning">Editar Pelicula</button>
    </form>
    @if (session('update'))
    <div class="alert alert-success mt-3">
        {{session('update')}}
    </div>
    @endif
</div>
@endsection
