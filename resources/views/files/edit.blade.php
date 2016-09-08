@extends('layouts.dashboard')

@section('after-styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Editar boton/Archivo(link)</h2>
            {!! Form::model($file, ['method' => 'PATCH','route' => ['admin.files.update', $file], 'id' => 'edit-files-form', 'files' => true]) !!}
                @include('files.partials._form',[ 'submitButtonText' => 'Editar', 'showType' => '0'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
