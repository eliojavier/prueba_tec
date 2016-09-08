@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary panel-tec">
                <div class="panel-body ">
                    {!! Form::open(['url' => '/register', 'id' => 'register-form']) !!}
                        @include('auth.partials._form',[ 'submitButtonText' => 'Registrar'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after-script-end')
    <script>
        $(document).ready(function() {

            $('#register-form').validate({
                lang: 'es'
            });
            $("#document").mask("999999?9999");
            $('#phone').mask("(+58)999-9999999");

        });
    </script>
@endsection
