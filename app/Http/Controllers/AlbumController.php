<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Requests\AlbumRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::latest('created_at')->paginate(4);
        $levels = array('Nivel 1' => 'Nivel 1', 'Nivel 2' => 'Nivel 2', 'Nivel 3' => 'Nivel 3',
                        'Nivel 4' => 'Nivel 4', 'Baby TEC' => 'Baby TEC');
        
        return view('albums.index', compact('albums', 'levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AlbumRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        Album::create($request->all());

        return redirect('admin/albums')->with([
            'flash_message_success' => 'Álbum creado exitosamente.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Album $album
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Album $album)
    {
        $levels = array('Nivel 1' => 'Nivel 1', 'Nivel 2' => 'Nivel 2', 'Nivel 3' => 'Nivel 3',
            'Nivel 4' => 'Nivel 4', 'Baby TEC' => 'Baby TEC');
        return view('albums.edit', compact('album', 'preview', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Album $album
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Album $album)
    {
        $album->update($request->all());
        return back()->with([
            'flash_message_success' => 'Álbum editado exitosamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Album $album
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return back()->with([
            'flash_message_success' => 'Álbum borrado exitosamente.'
        ]);
    }

    /**
     * Bulk upload o photos.
     * @param Request $request
     * @param Gallery $gallery
     * @return
     */
    public function addPhoto(Request $request, Album $album)
    {
        $this->validate($request, [
            'file' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);
        $album->addPhoto($this->makePhoto($request->file('file')));

        return Response::json('success', 200);

    }

    public function makePhoto(UploadedFile $file)
    {
        return File::named($file->getClientOriginalName())->store($file);

    }

    /**
     * Display the specified resource.
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function gallery(Album $album)
    {
        $pictures = $album->photos()->paginate(8);

        if($album->visibility)
        {
            if(Auth::check())
            {
                return view('albums.album', compact('gallery', 'pictures'));

            }
            abort(403);
        }
        return view('galleries.gallery', compact('gallery', 'pictures'));
    }
}
