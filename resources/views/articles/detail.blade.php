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
                <span class="pull-right text-danger">
                    {{$article->published_date }}
                </span>
                <h1 class="text-danger">
                  {{$article->title}}
                </h1>
                <p>
                    {!! html_entity_decode($article->body) !!}
                </p>
            </div>
        </div>
    </div>


@endsection

@section('after-script-end')

@endsection