<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Requests\AlbumRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
