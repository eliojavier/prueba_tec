<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;
use App\Contact;
use Auth;
use App\Mailers\ContactMailer as Mailer;
use App\Article;
use App\File;
/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{

    protected $mailer;


    /**
     * Constructor.
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->middleware('auth', ['only' => ['gallery']]);
        $this->mailer = $mailer;
    }

    public function welcome()
    {
        $articles= Article::published()->public()->latest('published_date')->take(5)->get();
        $links= File::islink()->latest('created_at')->take(5)->get();
        return view('pages.welcome',compact('articles','links'));
    }

    public function story()
    {
        return view('pages.story');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $user = Auth::user();

        return view('pages.profile', compact('user'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function team()
    {
        return view('pages.team');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function level($id)
    {
        $calendar = File::isbutton()->where('display_name','calendario')->first();
        $level = File::isbutton()->where('display_name','Nivel '.$id)->first();
        $files = File::isbutton()->where('display_name','Archivo Nivel '.$id)->first();
        $team = File::isbutton()->where('display_name','Equipo Docente')->first();
        return view('levels.level'.$id,compact('calendar','level','files','team'));
    }

    public function family($name)
    {
        $calendar = File::isbutton()->where('display_name','calendario')->first();
        $level = File::isbutton()->where('display_name', $name)->first();
        $files = File::isbutton()->where('display_name','Archivo '.$name)->first();
        $team = File::isbutton()->where('display_name','Equipo Docente')->first();
        $info= File::isbutton()->where('display_name','info')->first();
        $menu= File::isbutton()->where('display_name','Menu '.$name)->first();
        $register= File::isbutton()->where('display_name','Inscripción '.$name)->first();
        $activities= File::isbutton()->where('display_name','Actividades')->first();
        return view('family.'.$name,compact('calendar','level','files','team','info','menu','register','activities'));
    }

    public function sendContactEmail(ContactRequest $request)
    {
        $contact = new Contact($request->input('name'), $request->input('email'), $request->input('message'));
        $this->mailer->sendContact($contact);

        return back()->with([
            'flash_message_success' => 'Solicitud enviada exitosamente.'
        ]);;
    }

    /**
     * @param Request $request
     * @return RedirectResponse|string
     * @internal param Request $renquest
     */
    public function addAvatar(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'image-data' => 'required',
                'file'       => 'required'
            ]);
            if ($validator->fails()) {
                return Response::json(array(
                    'success' => false,
                    'errors'  => $validator->getMessageBag()->toArray()
                ), 400);
            }
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $encoded = $request->input('image-data');
                $filteredData = substr($encoded, strpos($encoded, ",") + 1);
                $decodedData = base64_decode($filteredData);
                $filename = 'uploads/avatars/' . time() . $file->getClientOriginalName();
                $upload_success = file_put_contents($filename, $decodedData);
                if ($upload_success) {
                    $user = Auth::user();
                    $user->avatar = $filename;
                    $user->save();

                    return Response::json('success', 200);
                } else {
                    return Response::json(array(
                        'success' => false,
                        'errors'  => ['key' => 'Error guardando la imagen.']
                    ), 400);
                }
            }
        }

        return back();
    }
}
