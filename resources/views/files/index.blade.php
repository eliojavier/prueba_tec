@extends('layouts.dashboard')

@section('after-styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <h2>Crear boton</h2>
        <div class="col-md-4">
            {!! Form::open(['route' => ['admin.files.store'], 'id' => 'gallery-form',  'files' => true]) !!}
            @include('files.partials._form',[ 'submitButtonText' => 'Crear Boton', 'showType' => '1'])
            {!! Form::close() !!}
        </div>

        <div class="col-md-4">
            <h2>Botones</h2>
            {{ $buttons->links() }}
            @foreach($buttons as $button)
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{url('/')."/".$button->path}}" target="_blank" class="btn btn-default">{{$button->display_name}}</a>
                        <div class="pull-right">
                            <a href="{{route('admin.files.edit',$button)}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Editar
                            </a>
                            {{ Form::open(['route' => ['admin.files.destroy', $button], 'style' => 'display:inline']) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::button('<i class="fa fa-trash-o"></i> Borrar', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'data-original-title' => 'Delete', 'data-toggle' => 'tooltip']) }}
                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
                <hr>
            @endforeach
            {{ $buttons->links() }}

        </div>
        <div class="col-md-4">
            <h2>Archivos (Links)</h2>
            {{ $links->links() }}
            @foreach($links as $link)
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{url('/')."/".$link->path}}" target="_blank" >{{$link->display_name}}</a>
                        <div class="pull-right">
                            <a href="{{route('admin.files.edit',$link)}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Editar
                            </a>
                            {{ Form::open(['route' => ['admin.files.destroy', $link], 'style' => 'display:inline']) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::button('<i class="fa fa-trash-o"></i> Borrar', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger ', 'data-original-title' => 'Delete', 'data-toggle' => 'tooltip']) }}
                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
                <hr>
            @endforeach
            {{ $links->links() }}
        </div>
    </div>
@endsection
