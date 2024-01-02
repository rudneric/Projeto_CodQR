<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('cadastros.cadVideos');
    }

    public function store(Request $request)
    {
        $video = new Video();
        $request->validate([
            'vidTitulo' => 'required',
            'vidVideo' => 'required',
         ], 
        [
            'vidTitulo.required' => 'Campo Titulo é obrigatório!',
            'vidVideo.required' => 'Campo Video é obrigatório!',
        ]);

        $video->vidTitulo = $request->vidTitulo;
        $video->vidVideo = $request->vidVideo;

        $video->save();

        return view('cadastros.cadVideos');
    }

    public function show(Request $request)
    {
        //
    }

    public function edit(Video $video)
    {
        //
    }

    public function update(Request $request, Video $video)
    {

        $video->update( [
            'vidTitulo'=> $request->vidTitulo,
            'vidVideo'=> $request->vidVideo,
        ]);

        return redirect('/exibe/itens/banco');
    }

    public function destroy(Request $request)
    {
        Video::destroy($request->id);

        $request->session();

        return redirect('/exibe/itens/banco');
    }
}
