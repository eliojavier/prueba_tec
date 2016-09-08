@extends('layouts.app')

@section('after-styles')
    <style>

    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 top-margin">
                <h2 class="text-primary">{{$gallery->name}}</h2>
                <hr class="hr-primary">
                <p>
                    {{$gallery->description}}
                </p>
            </div>
        </div>
        {{ $pictures->links() }}
        @foreach ($pictures->chunk(4) as $set)
            <div class="row">
                @foreach ($set as $photo)
                    <div class="col-md-3 top-margin">
                        <a href="{{url('/')}}/{{$photo->path}}" data-lity>
                            <img class="img-responsive round-border" src="{{url('/')}}/{{$photo->thumbnail_path}}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
        {{ $pictures->links() }}

    </div>


@endsection

@section('after-script-end')

@endsection