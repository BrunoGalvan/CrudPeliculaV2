<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Turno;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Storage;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos = Turno ::where('estado','Activo')->get();
        $data = array("lista_turnos" => $turnos);
        $peliculas = Pelicula::paginate(5);
        return view('inicio' , compact('peliculas'),$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turnos = Turno ::where('estado','Activo')->get();
        $data = array("lista_turnos" => $turnos);
        return response()->view('agregar',$data,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peliculaAgregar = new Pelicula;
        $request->validate([
            'nombre' => 'required',
            'fechapublicacion' => 'required',
            'estado' => 'required',
            'turno' => 'required',
        ]);
        $peliculaAgregar->nombre = $request->nombre;
        $peliculaAgregar->fechapublicacion = $request->fechapublicacion;
        $peliculaAgregar->estado = $request->estado;
        $peliculaAgregar->turno = $request->turno;
        if($request->hasFile('Foto')){
            $peliculaAgregar['Foto']=$request->file('Foto')->store('uploads','public');
        }
        $peliculaAgregar->save();
        return back()->with('agregar' , 'La Pelicula se ha agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $turnos = Turno ::where('estado','Activo')->get();
        $data = array("lista_turnos" => $turnos);
        $peliculaActualizar = Pelicula::findOrFail($id);
        return view('editar' , compact('peliculaActualizar'),$data,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $peliculaUpdate = Pelicula::findOrFail($id);
        $request->validate([
            'nombre' => 'required',
            'fechapublicacion' => 'required',
            'estado' => 'required',
            'turno' => 'required',
        ]);
        $peliculaUpdate ->nombre = $request->nombre;
        $peliculaUpdate ->fechapublicacion = $request->fechapublicacion;
        $peliculaUpdate ->estado = $request->estado;
        $peliculaUpdate ->turno = $request->turno;
        if($request->hasFile('foto')){
            $peliculaUpdate=Pelicula::findOrFail($id);
            Storage::delete('public/'.$peliculaUpdate->foto);
            $peliculaUpdate['foto']=$request->file('foto')->store('uploads','public');
        }
        $peliculaUpdate ->save();
        return back()->with('update',' La Pelicula ha sido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peliculaEliminar = Pelicula::findOrFail($id);
        $peliculaEliminar ->delete();
        return back()->with('eliminar','La Pelicula ha sido eliminada Correctamente');
    }

    public function stateon(Request $request, $id)
   {
    $estadoon = Pelicula ::where('id',$id)
    ->update(['estado' => 'Activo']);
    return back()->with('estadoon','Pelicula Activa');
  }

      public function stateoff(Request $request, $id)
   {
    $estadooff = Pelicula ::where('id',$id)
    ->update(['estado' => 'Inactivo']);
    return back()->with('estadooff','Pelicula Inactiva');
  }

  public function turn(Request $request, $id)
  {
    $asignarturno = Pelicula::findOrFail($id);
    $asignarturno ->turno = $request->turno;
    $asignarturno ->save();
    return back()->with('asignarturno','Turno Asignado');
 }
}
