<?php

namespace App\Http\Controllers;

use App\Models\anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anime = anime::select('*')->get();

        return view('back.anime.index', compact('anime'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.anime.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $anime = new anime();

        $anime->titulo = $request->titulo;
        $anime->descripcion = $request->descripcion;

        if($request->hasFile('imagen')){
            $file = $request->imagen;

            $nombre_nuevo = date('YmdHis')."_".$file->getClientOriginalName();

            $file->move(public_path('poster_anime'), $nombre_nuevo);

            $anime->imagen = $nombre_nuevo;

        }else{
            $anime->imagen = "";
        }

        $anime->save();

        return redirect('admin-list-anime');
    }

    /**
     * Display the specified resource.
     */
    public function show(anime $anime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anime = anime::findOrFail($id);
        return view('back.anime.edit', compact('anime'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $anime = request()->except(['_token', '_method']);

        if($request->hasFile('imagen')){
            $file = $request->imagen;

            $nombre_nuevo = date('YmdHis')."_".$file->getClientOriginalName();

            $file->move(public_path('poster_anime'), $nombre_nuevo);

            $anime['imagen'] = $nombre_nuevo;
        }

        anime::where('id', '=', $id)->update($anime);

        return redirect('admin-list-anime');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(anime $anime)
    {
        //
    }
}