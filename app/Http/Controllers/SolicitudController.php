<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        
        $solicitudes = DB::table('Solicitud')->get(); // obtenemos todos los proyectos en la base de datos
        return view('TallerVista/index', ['Solicitud' => $solicitudes]); // pasamos los proyectos a la vista
        // view('ejemploProyecto.index', ahi se pone el nombre de la carpeta en vista);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("TallerVista/new");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Solicitud::create($request->all()); //testing if it works
        return redirect(route('taller.index'))->with('success', 'Solicitud creada correctamente'); // redirige a la vista index con un mensaje de éxito
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $solicitud = Solicitud::find($id); // buscamos la solicitud por su id
        return view('TallerVista/update', compact ('solicitud')); // pasamos la solicitud a la vista de edición
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'tema' => 'required',
            'area' => 'required',
            'estado' => 'required',
            'observaciones' => 'nullable',
            'usuario_externo' => 'boolean'
        ]);
        $solicitud = Solicitud::find($id); // buscamos la solicitud por su id
        $solicitud->update($request->all());
        return redirect('taller/')
            ->with('success', 'Solicitud actualizada correctamente'); // redirige a la vista index con un mensaje de éxito 
        // actualiza la solicitud con los datos del formulario
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $solicitud = Solicitud::find($id); // Buscar la solicitud por su ID

    if (!$solicitud) {
        return redirect()->route('taller.index')->with('error', 'Solicitud no encontrada.');
    }

    $solicitud->delete(); // Eliminar la solicitud

    return redirect()->route('taller.index')->with('success', 'Solicitud eliminada correctamente.');
}

}
