<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use Datatables;
use App\Mailers\UserMailer as Mailer;

class UserController extends Controller
{

    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->middleware('auth');
        $this->middleware('role:admin|personnel');
        $this->mailer = $mailer;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest|Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if ($user->hasRole('parent')) {
            $user->update($request->all());

            return back()->with([
                'flash_message_success' => 'Usuario editado exitosamente.'
            ]);
        }

        return back()->with([
            'flash_message_error' => 'No se pudo editar el usuario inesperado.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $back = url()->previous() . '#inactive';
        if ($user->hasRole('parent') && ! $user->verified) {
            $user->delete();

            return redirect($back)->with([
                'flash_message_success' => 'Usuario borrado exitosamente.'
            ]);
        }

        return redirect($back)->with([
            'flash_message_error' => 'El usuario se encuentra activo en sistema.'
        ]);
    }

    public function changeStatus(User $user, $status)
    {
        if ($user->hasRole('parent')) {
            $user->update([
                'verified' => $status
            ]);

            if ((boolean) $status) {
                $this->mailer->sendConfirmation($user);
            }

        }

        return back()->with([
            'flash_message_success' => 'Estatus cambiado exitosamente.'
        ]);;
    }


    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function activeParentsData()
    {
        $parents = User::active()->withRole('parent')->select(['id', 'first_name', 'last_name', 'email', 'phone','children'])->latest('created_at');

        return Datatables::of($parents)
            ->addColumn('edit', function ($parent) {
                return '<a target="_blank" href="' . route('admin.users.edit', $parent) . '" class="btn btn-link btn-xs new-window">Editar</a>';
            })
            ->addColumn('deactivate', function ($parent) {
                return '<form action="' . route('admin.users.status', [$parent, 'status' => 0]) . '" method="POST">' .
                csrf_field() .
                '<button type="submit" class="btn btn-link btn-xs">Desactivar</button>' .
                '</form>';
            })
            ->removeColumn('id')
            ->make(true);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function inactiveParentsData()
    {
        $parents = User::inactive()->withRole('parent')->select(['id', 'first_name', 'last_name', 'email', 'phone','children'])->latest('created_at');

        return Datatables::of($parents)
            ->addColumn('edit', function ($parent) {
                return '<a target="_blank" href="' . route('admin.users.edit', $parent) . '" class="btn btn-link btn-xs new-window">Editar</a>';
            })
            ->addColumn('activate', function ($parent) {
                return '<form action="' . route('admin.users.status', [$parent, 'status' => 1]) . '" method="POST">' .
                csrf_field() .
                '<button type="submit" class="btn btn-link btn-xs">Activar</button>' .
                '</form>';
            })
            ->addColumn('delete', function ($parent) {
                return '<form action="' . route('admin.users.destroy', $parent) . '" method="POST">' .
                csrf_field() .
                method_field('DELETE') .
                '<button type="submit" class="btn btn-link btn-xs">Borrar</button>' .
                '</form>';
            })
            ->removeColumn('id')
            ->make(true);
    }
}
