@extends('plantilla')

@section('content')
<div class="col-md-5">
    <h3 class="text-left mb-3 pt-3">Editar el Turno ID : {{$turnoActualizar->id}}</h3>
    <form action="{{route('updatet' , $turnoActualizar->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <input type="time" name="turno" id="turno" value="{{$turnoActualizar->turno}}" class="form-control">
        </div>
        @error('turno')
        <div class="alert alert-danger">
            El turno es requerido
        </div>
    @enderror
        <div class="form-group">
            <select name="estado" id="estado" class="form-control">
              <option>{{$turnoActualizar->estado}}</option>
              @if ($turnoActualizar->estado == 'Activo')
              <option>Inactivo</option>
              @else
              <option>Activo</option>
              @endif
            </select>
          </div>


        @error('estado')
        <div class="alert alert-danger">
            El estado es requerida
        </div>
        @enderror
        <button type="submit" class="btn btn-warning">Editar Pelicula</button>
    </form>
    @if (session('updatet'))
    <div class="alert alert-success mt-3">
        {{session('updatet')}}
    </div>
    @endif
</div>
@endsection
