@extends('layouts.dashboard')

@section('after-styles')
    <link href="{{ asset('css/bootstrap-datepicker.standalone.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary top-margin">
                <div class="panel-heading">
                    <h2>Crear noticia</h2>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => ['admin.articles.store'], 'id' => 'articles-form']) !!}
                    @include('articles.partials._form',[ 'submitButtonText' => 'Crear noticia'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-script-end')
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('js/datePicker.js')}}"></script>
    <script>
        $('#published_date').datepicker({
            format: 'dd-mm-yyyy',
            startDate: new Date(),
            pickTime: false
        });

        $(document).ready(function() {
            $('#body').ckeditor();

            $('#articles-form').validate({
                lang: 'es'
            });
        });
    </script>
@endsection