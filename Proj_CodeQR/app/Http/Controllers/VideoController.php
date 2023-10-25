<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

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

        $video->vidTitulo = $request->vidTitulo;
        $video->vidVideo = $request->vidVideo;

        $video->save();

        return redirect('dashboard');
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
