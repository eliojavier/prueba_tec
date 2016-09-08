<div class="form-group col-md-12 {{ $errors->has('name') ? ' has-error' : '' }} person-field">
    {!!Form::select('level', $levels, null, ['class'=>'form-group'])!!}
    @if ($errors->has('level'))
        <span class="help-block">
                <strong>{{ $errors->first('level') }}</strong>
        </span>
    @endif

    {!! Form::text('name', old('name') , ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nombre']) !!}
    @if ($errors->has('name'))
        <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="col-md-6">
    {!! Form::radio('visibility', '0',true,['id' => 'public']) !!}
    {!! Form::label('public', 'Publico', ['class' => 'control-label']) !!}
    <br>
    {!! Form::radio('visibility', '1',null,['id' => 'private']) !!}
    {!! Form::label('private', 'Privada:', ['class' => 'control-label']) !!}
</div>
{{--<div class="col-md-6">--}}

    {{--{!! Form::select('type',--}}
        {{--[--}}
        {{--'normal' => 'Normal',--}}
        {{--'slider' => 'Slider',--}}
        {{--'banner' => 'Banner',--}}
        {{--]--}}
    {{--, null, [ 'class' =>  'form-control',])--}}
    {{--!!}--}}

{{--</div>--}}

<div class=" top-margin form-group col-md-12 {{ $errors->has('description') ? ' has-error' : '' }} person-field">
    {!! Form::label('description', 'Descripción:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', old('description') , ['class' => 'form-control']) !!}

    @if ($errors->has('description'))
        <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>

<!--- Register Field --->
<div class="form-group">
    <div class="col-md-12 text-center">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-danger btn-lg']) !!}
    </div>
</div>
