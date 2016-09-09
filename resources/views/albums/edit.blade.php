@extends('layouts.dashboard')

@section('after-styles')
    <link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">

    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h2>Editar Gallería</h2>
            {!! Form::model($album, ['method' => 'PATCH','route' => ['admin.albums.update',$album], 'id' => 'edit-album-form']) !!}
                @include('albums.partials._form',[ 'submitButtonText' => 'Editar Álbum'])
            {!! Form::close() !!}
        </div>
        <div class="col-md-8">
            <h2>Aregar Fotos</h2>
            {!! Form::open(['route' => ['admin.albums.photo',$album], 'id' => 'photos-form', 'class' => 'dropzone', 'files' => true]) !!}
            <div class="dz-message" data-dz-message><span>Arrastre sus fotos</span></div>
            {!! Form::close() !!}

            <div class="row">
                @foreach($album->photos->take(6) as $photo)
                    <div class="col-md-4 top-margin">
                        <img class="img-responsive" src="{{url('/')}}/{{$photo->thumbnail_path}}" alt="">
                        <br/>
                        {{ Form::open(['route' => ['admin.files.destroy', $photo], 'style' => 'display:inline;']) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::button('<i class="fa fa-trash-o"></i> Borrar', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'data-original-title' => 'Delete', 'data-toggle' => 'tooltip']) }}
                        {{ Form::close() }}
                    </div>
                @endforeach
            </div>
            <hr>
            <div class="col-md-12 text-right">
                <a href="{{route('admin.albums.show',$album)}}" class="bt bt-link">Ver más >></a>
            </div>
        </div>

    </div>
@endsection

@section('after-script-end')
    <script src="{{ asset('js/dropzone.js') }}"></script>

    <script>
        Dropzone.options.photosForm = {
            maxFilesize: 5,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp',
            init: function() {
                this.on('success', function( file, resp ){
                    console.log( file );
                    console.log( resp );
                });
                this.on('error', function( e ){
                    console.log('erors and stuff');
                    console.log( e );
                });
                this.on("complete", function (file) {
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                        console.log('Imagenes cargadas')
                        location.reload();
                    }
                });
            }
        }
    </script>
@endsection