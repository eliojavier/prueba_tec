<div class="form-group col-md-12 {{ $errors->has('name') ? ' has-error' : '' }} person-field">
    {!! Form::label('display_name', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('display_name', old('display_name') , ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nombre']) !!}

    @if ($errors->has('display_name'))
        <span class="help-block">
                <strong>{{ $errors->first('display_name') }}</strong>
        </span>
    @endif
</div>

@if($showType)
    <div class="col-sm-12" style="margin-bottom: 15px">

        {!! Form::select('type',
        [
        '2'      => 'boton',
        '3'      => 'Archivo',
        ]
        , null, [ 'class' =>  'form-control',])
        !!}
    </div>
@endif

<div class="form-group col-md-12 {{ $errors->has('file') ? ' has-error' : '' }} person-field">
    {!! Form::label('file', 'Archivo (PDF):', ['class' => 'control-label']) !!}
    {!! Form::file('file') !!}

    @if ($errors->has('file'))
        <span class="help-block">
                <strong>{{ $errors->first('file') }}</strong>
        </span>
    @endif
</div>

<!--- Register Field --->
<div class="form-group">
    <div class="col-md-12 text-center">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-danger btn-lg']) !!}
    </div>
</div>
