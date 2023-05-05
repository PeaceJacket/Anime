<?php

namespace App\Http\Controllers;

use App\Models\peliculas;
use Illuminate\Http\Request;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = peliculas::select('*')->get();
        
        return view('back.peliculas.index', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $peliculas = new peliculas();

        $peliculas->titulo = $request->titulo;
        $peliculas->descripcion = $request->descripcion;

        if($request->hasFile('imagen')){
            $file = $request->imagen;

            $nombre_nuevo = date('YmdHis')."_".$file->getClientOriginalName();

            $file->move(public_path('poster_peliculas'), $nombre_nuevo);

            $peliculas->imagen = $nombre_nuevo;

        }else{
            $peliculas->imagen = "";
        }

        $peliculas->save();

        return redirect('admin-list-peliculas');
    }

    /**
     * Display the specified resource.
     */
    public function show(peliculas $peliculas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $peliculas = peliculas::findOrFail($id);
        return view('back.peliculas.edit', compact('peliculas'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $peliculas = request()->except(['_token', '_method']);

        if($request->hasFile('imagen')){
            $file = $request->imagen;

            $nombre_nuevo = date('YmdHis')."_".$file->getClientOriginalName();

            $file->move(public_path('poster_peliculas'), $nombre_nuevo);

            $peliculas['imagen'] = $nombre_nuevo;
        }

        peliculas::where('id', '=', $id)->update($peliculas);

        return redirect('admin-list-peliculas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(peliculas $peliculas)
    {
        //
    }
}
