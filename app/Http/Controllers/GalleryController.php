<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests\GalleryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Auth;
/**
 * Class GalleryController
 * @package App\Http\Controllers
 */
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $galleries = Gallery::latest('created_at')->paginate(4);
        
        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GalleryRequest|Request $request
     * @return Response
     */
    public function store(GalleryRequest $request)
    {
        Gallery::create($request->all());

        return redirect('admin/galleries')->with([
            'flash_message_success' => 'Galeria creada exitosamente.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery', 'preview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Gallery $gallery
     * @return Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $gallery->update($request->all());

        return back()->with([
            'flash_message_success' => 'Galeria editada exitosamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return back()->with([
            'flash_message_success' => 'Galeria borrada exitosamente.'
        ]);
    }

    /**
     * Bulk upload o photos.
     * @param Request $request
     * @param Gallery $gallery
     * @return
     */
    public function addPhoto(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'file' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);
        $gallery->addPhoto($this->makePhoto($request->file('file')));

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
    public function gallery(Gallery $gallery)
    {
        $pictures = $gallery->photos()->paginate(8);

        if($gallery->visibility)
        {
            if(Auth::check())
            {
                return view('galleries.gallery', compact('gallery', 'pictures'));

            }
            abort(403);
        }
        return view('galleries.gallery', compact('gallery', 'pictures'));
    }

}
