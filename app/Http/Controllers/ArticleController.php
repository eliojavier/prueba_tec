<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Auth;
use App\Article;
use Datatables;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['all','detail']]);
        $this->middleware('role:admin|personnel', ['except' => ['all','detail']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('articles.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function all()
    {
        $articles= Article::published()->public()->latest('published_date')->paginate(5);
        return view('articles.all', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest|Request $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        Auth::user()->articles()->create($request->all());

        return redirect('admin/articles')->with([
            'flash_message_success' => 'Noticia agregada exitosamente.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function detail(Article $article)
    {
        return view('articles.detail',compact('article'));
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Article $article
     * @return Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return back()->with([
            'flash_message_success' => 'Noticia editada exitosamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return Response
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return back()->with([
            'flash_message_success' => 'Noticia borrada exitosamente.'
        ]);
    }

    public function articlesData()
    {
        $articles = Article::select(['slug', 'title', 'author', 'published_date'])->latest('published_date');

        return Datatables::of($articles)
            ->addColumn('edit', function ($article) {
                return '<a target="_blank" href="' . route('admin.articles.edit', $article) . '" class="btn btn-link btn-xs new-window">Editar</a>';
            })
            ->addColumn('delete', function ($article) {
                return '<form action="' . route('admin.articles.destroy', $article) . '" method="POST">' .
                csrf_field() .
                method_field('DELETE') .
                '<button type="submit" class="btn btn-link btn-xs">Borrar</button>' .
                '</form>';
            })
            ->removeColumn('slug')
            ->make(true);
    }
}
