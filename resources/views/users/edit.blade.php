@extends('layouts.dashboard')

@section('after-styles')
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
                    <h2>Editar representante</h2>
                </div>
                <div class="panel-body">
                    {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.update',$user], 'id' => 'edit-parent-form']) !!}
                    @include('users.partials._form',[ 'submitButtonText' => 'Editar representante'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-script-end')
    <script>
        $(document).ready(function() {

            $('#edit-parent-form').validate({
                lang: 'es'
            });
            $('#phone').mask("(+58)999-9999999");

        });
    </script>
@endsection