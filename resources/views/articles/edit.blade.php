@extends('layouts.dashboard')

@section('after-styles')
    <link href="{{ asset('css/bootstrap-datepicker.standalone.min.css') }}" rel="stylesheet">
    <style>
        nav{
            display: none;
        }
        #page-wrapper {
            margin: 0;
        }
        #wrapper{
            min-height: 100vh;
            background: white;
        }

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary top-margin">
                <div class="panel-heading">
                    <h2>Editar noticia</h2>
                </div>
                <div class="panel-body">
                    {!! Form::model($article, ['method' => 'PATCH','route' => ['admin.articles.update',$article], 'id' => 'edit-article-form']) !!}
                    @include('articles.partials._form',[ 'submitButtonText' => 'Editar noticia'])
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

            $('#edit-article-form').validate({
                lang: 'es'
            });
        });
    </script>
@endsection