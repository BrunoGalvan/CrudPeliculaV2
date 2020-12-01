<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;
use App;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos = App\Models\Turno::paginate(5);
        return view('turno' , compact('turnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agregart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turnoAgregar = new Turno;
        $request->validate([
            'turno' => 'required',
            'estado' => 'required',
        ]);
        $turnoAgregar->turno = $request->turno;
        $turnoAgregar->estado = $request->estado;
        $turnoAgregar->save();
        return back()->with('registrart' , 'El turno se ha agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(Turno $turno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turnoActualizar = App\Models\Turno::findOrFail($id);
        return view('editart' , compact('turnoActualizar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $turnoUpdate = App\Models\Turno::findOrFail($id);
        $request->validate([
            'turno' => 'required',
            'estado' => 'required',
        ]);
        $turnoUpdate ->turno = $request->turno;
        $turnoUpdate ->estado = $request->estado;
        $turnoUpdate ->save();
        return back()->with('updatet',' El turno ha sido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turnoEliminar = App\Models\Turno::findOrFail($id);
        $turnoEliminar ->delete();
        return back()->with('eliminart','El turno ha sido eliminada Correctamente');
    }

    public function stateon(Request $request, $id)
    {
     $estadoon = Turno ::where('id',$id)
     ->update(['estado' => 'Activo']);
     return back()->with('estadoont','Turno Activa');
   }
 
       public function stateoff(Request $request, $id)
    {
     $estadooff = Turno ::where('id',$id)
     ->update(['estado' => 'Inactivo']);
     return back()->with('estadoofft','Turno Inactiva');
   }
 }
 

