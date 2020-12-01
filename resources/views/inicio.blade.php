@extends('plantilla')

@section('content')

@if (session('eliminar'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('eliminar')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>   
@endif
@if (session('estadoon'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('estadoon')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>   
@endif
@if (session('estadooff'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session('estadooff')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>   
@endif
@if (session('asignarturno'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('asignarturno')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>   
@endif
     <div class="row">
          <div class="col-md"> 
                <div class="form-row">
                  <div class="col-7">
                    <h3 class="text-left mb-4">Peliculas</h3>
                  </div>
                  <div class="col">
                  </div>
                  <div class="col-auto">
                        <a href="{{route('agregar')}}" class="btn btn-primary">Nueva Pelicula</a>
                  </div>
                </div>
              <table class="table"
              <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>F. Publicacion</th>
                  <th>Estado</th>
                  <th>Turno</th>
                  <th>Foto</th>
                  <th>Acciones</th>
              </tr>
              @foreach ($peliculas ?? '' as $item)
                  <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->nombre}}</td>
                      <td>{{$item->fechapublicacion}}</td>
                      <td>{{$item->estado}}</td>
                      <td>{{$item->turno}}</td>
                        <td>
                          <img src="{{ asset('storage').'/'.$item->foto}}" alt="50" width="50" >
                      </td>
                      <td>
                          <a href="{{route('editar' , $item->id)}}" class="btn btn-warning">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                          </a>
                          @if ($item->estado == 'Inactivo')
                          <a href="{{route('estadoon' , $item->id)}}" class="btn btn-info">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-unlock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"/>
                              <path fill-rule="evenodd" d="M8.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                            </svg>
                          </a>
                          @else
                          <a href="{{route('estadooff' , $item->id)}}" class="btn btn-info">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M2.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"/>
                              <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                            </svg>
                          </a>
                          @endif

                          <a data-toggle="modal" data-target="#exampleModal" class="btn btn-dark">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock-history" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                              <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                              <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                          </a>
                        <form action="{{route('eliminar', $item->id)}}" method="POST" class="d-inline">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                        </button>
                      </form>
                    </td> 
                  </tr>
                  <!-- Modal -->

                  <form action="{{route('asignarturno' , $item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Asignar Turno a Pelicula ID : {{$item->id}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                       
                         <div>
                           <div class="input-group">
                             <div class="input-group-prepend">
                               <div class="input-group-text">Turnos Disponibles</div>
                             </div>

                               <select class="form-control" name="turno" id="turno">
                                     <option value="{{$item->turno}}">{{$item->turno}}</option>
                                 @foreach ($lista_turnos as $items)
                                     <option value = "{{$items->turno}}">{{$items->turno}}</option>
                                 @endforeach
                               </select>
                           </div>
                           <br>

                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              @endforeach
              </table>
      
                {{ $peliculas ?? ''->links()}}
               <style>
                   .w-5{
                       display: none
                   }
               </style>
          </div>
          
     </div>

     
   
@endsection

