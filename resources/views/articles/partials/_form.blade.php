<div class="form-group col-md-6 {{ $errors->has('title') ? ' has-error' : '' }} person-field">
    {!! Form::label('title', 'Título:', ['class' => 'control-label']) !!}
    {!! Form::text('title', old('title') , ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Título']) !!}

    @if ($errors->has('title'))
        <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-md-6 {{ $errors->has('slug') ? ' has-error' : '' }} person-field">
    {!! Form::label('slug', 'Slug (opcional):', ['class' => 'control-label']) !!}
    {!! Form::text('slug', old('slug') , ['class' => 'form-control', 'placeholder' => 'por defecto es igual que el titulo']) !!}
    @if ($errors->has('slug'))
        <span class="help-block">
                <strong>{{ $errors->first('slug') }}</strong>
        </span>
    @endif
</div>


<div class="form-group col-md-12 {{ $errors->has('published_date') ? ' has-error' : '' }} person-field">
    {!! Form::label('published_date', 'Fecha de publicación:', ['class' => 'control-label']) !!}
    {!! Form::text('published_date', old('published_date') , ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Fecha de publicación']) !!}

    @if ($errors->has('published_date'))
        <span class="help-block">
                <strong>{{ $errors->first('published_date') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-md-12 {{ $errors->has('body') ? ' has-error' : '' }} person-field">
    {!! Form::label('body', 'Contenido:', ['class' => 'control-label']) !!}
    {!! Form::textarea('body', old('body') , ['class' => 'form-control', 'required' => 'required']) !!}

    @if ($errors->has('body'))
        <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-md-12 {{ $errors->has('author') ? ' has-error' : '' }} person-field">
    {!! Form::label('author', 'Autor:', ['class' => 'control-label']) !!}
    {!! Form::text('author', old('author') , ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Autor']) !!}

    @if ($errors->has('author'))
        <span class="help-block">
                <strong>{{ $errors->first('author') }}</strong>
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

