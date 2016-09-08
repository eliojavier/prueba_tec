<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ButtonRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests;
use App\File;
use Illuminate\Http\Response;

/**
 * Class FileController
 * @package App\Http\Controllers
 */
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $buttons = File::isButton()->latest('created_at')->paginate(6);
        $links = File::isLink()->latest('created_at')->paginate(6);

        return view('files.index',compact('buttons','links'));
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
     * @param ButtonRequest|Request $request
     * @return Response
     */
    public function store(ButtonRequest $request)
    {
        if ($request->hasFile('file')) {
            $this->makePdf($request->input('display_name'),$request->input('type'),$request->file('file'));
        }

        return back()->with([
            'flash_message_success' => 'Boton agregada exitosamente.'
        ]);
    }

    /**
     * @param $name
     * @param $type
     * @param UploadedFile $file
     * @return mixed
     */
    public function makePdf($name, $type, UploadedFile $file)
    {
        return File::namedPdf($name,$type)->storePdf($file);
    }

    /**
     * Display the specified resource.
     *
     * @param File $file
     * @return Response
     */
    public function show(File $file)
    {
        dd($file->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param File $file
     * @internal param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(File $file)
    {
        return view('files.edit',compact('file'));
    }

    /**
     * @param ButtonRequest $request
     * @param File $file
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ButtonRequest  $request, File $file)
    {
        if ($request->hasFile('file')) {
            $temp = sprintf('%s-%s', time(),$request->input('display_name') . ".pdf");

            $file->update([
                'display_name' =>  $request->input('display_name'),
                'name' => $temp,
                'path' => sprintf('%s/%s', 'uploads/images', $temp)
            ]);
            
            $request->file('file')->move('uploads/images',  $temp);
        }
        else{
            $file->update(['display_name' => $request->input('display_name')]);
        }

        return back()->with([
            'flash_message_success' => 'Editado exitosamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param File $file
     * @return Response
     * @internal param int $id
     */
    public function destroy(File $file)
    {

        $file->delete();

        return back()->with([
            'flash_message_success' => 'Archivo borrada exitosamente.'
        ]);
    }
}
