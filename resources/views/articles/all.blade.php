@extends('layouts.app')

@section('after-styles')
    <style>

    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 top-margin">
                <h2 class="text-primary">Actualidad TEC</h2>
                <hr class="hr-primary">
                @foreach($articles as $article)
                    <article class="col-md-12">
                        <a href="{{route('articles.detail',$article)}}">
                           <span class="article-title">
                                {{$article->title}}
                           </span>
                            <span class="text-primary pull-right">
                            Leer más >>
                        </span>
                        </a>
                    </article>
                    <div style="clear: both"></div>
                    <hr>
                @endforeach
                {{$articles->links()}}
            </div>
        </div>
    </div>


@endsection

@section('after-script-end')

@endsection