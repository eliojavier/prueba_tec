@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12 top-margin">
                <img class="img-responsive round-border" src="{{asset('img/partyTec.jpg')}}" alt="Party TEC">
            </div>
            <div class="col-md-4 top-margin">
                <img class="img-responsive center round-border" src="{{asset('img/TEC_PARTYTEC.png')}}" alt="baby gym">
            </div>
            <div class="col-md-8 top-margin">
                <p class="top-margin">Party TEC es una alternativa que ofrece la Familia TEC, para que los más pequeños celebren sus cumpleaños juntos a sus compañeros, en el mejor ambiente de nuestro Preescolar.</p>
                <p>Ven a celebrar tu fiesta de cumpleaños con nosotros. Para más información contáctanos a través de:</p>
                <p>
                    <a href="mailto:partytec1@gmail.com," target="_top">partytec1@gmail.com, </a>
                    <br/>
                    @partytec1
                </p>
            </div>
            <div class="col-md-12">
                <hr/>

            </div>
        </div>
        <div class="row top-margin">

            <div class="col-md-8 ">
                <a target="_blank" href="{{ !empty($info->path)?  url('/') . "/" .  $info->path :'#' }}" class="btn btn-lg btn-danger btn-admission">
                    <span>Información</span>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('gallery',['gallery' => 'partyTEC'])}}" class="btn btn-lg btn-primary btn-admission">
                    Galería
                </a>
            </div>
        </div>

    </div>
@endsection
