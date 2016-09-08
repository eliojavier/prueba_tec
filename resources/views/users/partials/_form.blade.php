<div class="form-group col-md-6 {{ $errors->has('first_name') ? ' has-error' : '' }} person-field">
    {!! Form::label('first_name', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('first_name', old('first_name') , ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nombre']) !!}

    @if ($errors->has('first_name'))
        <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-md-6 {{ $errors->has('last_name') ? ' has-error' : '' }} person-field">
    {!! Form::label('last_name', 'Apellido:', ['class' => 'control-label']) !!}
    {!! Form::text('last_name', old('last_name') , ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Apellido']) !!}

    @if ($errors->has('last_name'))
        <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
        </span>
    @endif
</div>


<div class="form-group col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Correo:', ['class' => ' control-label']) !!}
    {!! Form::email('email', old('email') , ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Correo Electronico']) !!}

    @if ($errors->has('email'))
        <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
    {!! Form::label('phone', 'Télefono:', ['class' => ' control-label']) !!}
    {!! Form::text('phone', old('phone') , ['class' => 'form-control', 'placeholder' => 'Télefono', 'id' => 'phone']) !!}

    @if ($errors->has('phone'))
        <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif
</div>

<!--- Register Field --->
<div class="form-group">
    <div class="col-md-12 text-center">
        <hr/>
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-danger btn-lg']) !!}
    </div>
</div>

