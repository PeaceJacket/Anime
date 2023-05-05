<?php

namespace App\Http\Controllers;

use App\Models\CapitulosAnime;
use App\Models\anime;
use Illuminate\Http\Request;

class CapitulosAnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $anime_id = $request->idAnime;
        $anime = anime::findOrFail($anime_id);
        $capitulos = CapitulosAnime::select('*')->get();

        return view('back.capitulos.index', compact('capitulos', 'anime_id', 'anime'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $anime_id = $request->anime_id;
        return view('back.capitulos.create', compact('anime_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $anime = new CapitulosAnime();

        $anime->titulo = $request->titulo;
        $anime->descripcion = $request->descripcion;
        $anime->episodio = $request->episodio;
        $anime->anime_id = $request->anime_id;

        if($request->hasFile('video')){
            $file = $request->video;

            $nombre_nuevo = date('YmdHis')."_".$file->getClientOriginalName();

            $file->move(public_path('capitulo_anime'), $nombre_nuevo);

            $anime->video = $nombre_nuevo;

        }else{
            $anime->video = "";
        }

        $anime->save();

        return redirect('admin-capitulos-anime?idAnime='.$request->anime_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(CapitulosAnime $capitulosAnime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CapitulosAnime $capitulosAnime, $id)
    {
        $capitulo = CapitulosAnime::findOrFail($id);
        return view('back.capitulos.edit', compact('capitulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $anime = request()->except(['_token', '_method']);

        if($request->hasFile('video')){
            $file = $request->video;

            $nombre_nuevo = date('YmdHis')."_".$file->getClientOriginalName();

            $file->move(public_path('capitulo_anime'), $nombre_nuevo);

            $anime['video'] = $nombre_nuevo;
        }


        CapitulosAnime::where('id', '=', $id)->update($anime);

        return redirect('admin-capitulos-anime?idAnime='.$request->anime_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CapitulosAnime $capitulosAnime)
    {
        //
    }
}
