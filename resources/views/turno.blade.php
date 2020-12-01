@extends('plantilla')

@section('content')

     <div class="row">
          <div class="col-md-7"> 
                <div class="form-row">
                  <div class="col-7">
                    <h3 class="text-left mb-4">Turnos</h3>
                  </div>
                  <div class="col">
                  </div>
                  <div class="col-auto">
                        <a href="{{route('registrart')}}" class="btn btn-primary">Nuevo Turno</a>
                  </div>
                </div>
              <table class="table"
              <tr>
                  <th>ID</th>
                  <th>Turno</th>
                  <th>Estado</th>
                  <th>Acciones</th>
              </tr>
              @foreach ($turnos as $item)
                  <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->turno}}</td>
                      <td>{{$item->estado}}</td>
                      <td>
                          <a href="{{route('editart' , $item->id)}}" class="btn btn-warning">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                          </a>
                          @if ($item->estado == 'Inactivo')
                          <a href="{{route('estadoont' , $item->id)}}" class="btn btn-info">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-unlock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"/>
                              <path fill-rule="evenodd" d="M8.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                            </svg>
                          </a>
                          @else
                          <a href="{{route('estadoofft' , $item->id)}}" class="btn btn-info">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M2.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"/>
                              <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                            </svg>
                          </a>
                          @endif
                        <form action="{{route('eliminart', $item->id)}}" method="POST" class="d-inline">
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
              @endforeach
              </table>
              @if (session('eliminart'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{session('eliminart')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>   
              @endif
              @if (session('estadoont'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{session('estadoont')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>   
              @endif
              @if (session('estadoofft'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  {{session('estadoofft')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>   
              @endif
                {{ $turnos->links()}}
               <style>
                   .w-5{
                       display: none
                   }
               </style>
          </div>
          
     </div>
     

@endsection
