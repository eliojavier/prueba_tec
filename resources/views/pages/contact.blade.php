@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 top-margin">
                <iframe src="https://www.google.com/maps/embed/v1/place?q=+Preescolar+TEC&amp;key=AIzaSyA059Mb5aZ3116dniHHbJ5CaHe4IFnsT-0" width="100%" height="300" frameborder="0" style="border:0"></iframe>
            </div>
            <div class="col-md-4 top-margin">
                <h2 class="text-primary text-center">
                    <span class="icon-Visitanos"></span>
                    Visítanos</h2>
                <p class="text-center">
                    Av. Principal del Cafetal. Urb. Chuao. Municipio Baruta. Estado Miranda,
                    <strong>Caracas - Venezuela</strong>
                </p>
                <h2 class="text-primary text-center">
                    <span class="icon-Contacto"></span>
                    Contáctanos
                </h2>
                <p class="text-center">
                    +58 212-993 14.09<br>
                    +58 212-991 59.74<br>
                    <a href="mailto:info@preescolartec.com" target="_top">info@preescolartec.com</a>
                </p>
            </div>
            <div class="col-md-8 top-margin">
                {!! Form::open(['url' => 'contact', 'id' => 'contact-form']) !!}

                <div class="form-group col-md-12 {{ $errors->has('name') ? ' has-error' : '' }} person-field">
                    {!! Form::label('name', 'Nombre:', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name') , ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nombre']) !!}

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-md-12 {{ $errors->has('email') ? ' has-error' : '' }} person-field">
                    {!! Form::label('email', 'E-mail:', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email') , ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'E-mail']) !!}

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-md-12 {{ $errors->has('message') ? ' has-error' : '' }} person-field">
                    {!! Form::label('message', 'Mensaje:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('message', old('message') , ['class' => 'form-control', 'required' => 'required']) !!}

                    @if ($errors->has('message'))
                        <span class="help-block">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endif
                </div>
                <!--- Register Field --->
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <hr/>
                        {!! Form::submit('Enviar', ['class' => 'btn btn-danger btn-lg']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('after-script-end')
    <script>
        $(document).ready(function() {
            $('#contact-form').validate({
                lang: 'es'
            });
        });
    </script>
@endsection