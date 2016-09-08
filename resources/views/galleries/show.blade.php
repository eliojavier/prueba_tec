@extends('layouts.dashboard')

@section('after-styles')
    <style>

    </style>
@endsection

@section('content')

    @foreach ($gallery->photos->chunk(4) as $set)
        <div class="row">
            @foreach ($set as $photo)
                <div class="col-md-3 top-margin">
                    <img class="img-responsive" src="{{url('/')}}/{{$photo->thumbnail_path}}" alt="">
                    <br/>
                    {{ Form::open(['route' => ['admin.files.destroy', $photo], 'style' => 'display:inline']) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<i class="fa fa-trash-o"></i> Borrar', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'data-original-title' => 'Delete', 'data-toggle' => 'tooltip']) }}
                    {{ Form::close() }}
                </div>
            @endforeach
        </div>
    @endforeach
@endsection

@section('after-script-end')

@endsection