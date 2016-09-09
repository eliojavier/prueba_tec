@extends('layouts.dashboard')

@section('after-styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-4">

            {!! Form::open(['route' => ['admin.albums.store'], 'id' => 'album-form']) !!}
                @include('albums.partials._form',[ 'submitButtonText' => 'Crear Álbum'])
            {!! Form::close() !!}
        </div>
        <div class="col-md-8">
            {{ $albums->links() }}
            @foreach($albums as $album)
                <div class="row">
                    <p class="col-md-6"><strong>Nivel:</strong> {{$album->level}}</p>
                    <p class="col-md-6"><strong>Nombre:</strong> {{$album->name}}</p>
                    <p class="col-md-6"><strong>Visibilidad:</strong> {{$album->display_visibility}}</p>
                    <p class="col-md-6"><strong>tipo:</strong> {{$album->type}}</p>
                    <p class="col-md-6"><strong>Creada:</strong> {{$album->created_at->format('d-m-Y')}}</p>
                    <div class="col-md-8">
                        <p><strong>Descripción:</strong></p>
                        {{$album->description}}
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{route('admin.albums.show',$album->id)}}" class="btn btn-sm btn-info">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            Ver
                        </a>
                        <a href="{{route('admin.albums.edit', $album->id)}}" class="btn btn-sm btn-primary ">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Editar
                        </a>
                        {{ Form::open(['route' => ['admin.albums.destroy', $album], 'style' => 'display:inline']) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<i class="fa fa-trash-o"></i> Borrar', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'data-original-title' => 'Delete', 'data-toggle' => 'tooltip']) }}
                        {{ Form::close() }}
                    </div>
                </div>
                <hr>
            @endforeach
            {{ $albums->links() }}

        </div>
    </div>
@endsection

@section('after-script-end')
    <script>
        $('#gallery-form').validate({
            lang: 'es'
        });
    </script>
@endsection