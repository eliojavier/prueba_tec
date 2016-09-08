@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12 top-margin">
                <img class="img-responsive round-border" src="{{asset('img/deliTec.jpg')}}" alt="Nosotros">
            </div>
            <div class="col-md-4 top-margin">
                <img class="img-responsive center round-border" src="{{asset('img/DeliTEC.png')}}" alt="baby gym">

            </div>
            <div class="col-md-8 top-margin">
                <hr class="hr-danger" style="margin-top: 75px"/>
            </div>
            <div class="row top-margin">
                <div class="col-md-12">
                    <p>
                        Deli Tec nace de la inquietud de nosotras como madres de que nuestros hijos coman sano y balanceado,incentivándolos a probar e incorporar en su dieta diaria todos aquellos alimentos necesarios para el adecuado desarrollo físico y mental.
                    </p>
                    <p>Nuestro menú esta hecho bajo la supervisión de un nutricionista y confeccionado por nuestra chef siguiendo estrictas normas de higiene, evitando alimentos fritos y poco saludables, sin sacrificar el sabor, animándolos así a probar nuevas opciones sanas como frutas y verduras.</p>
                    <p>En Deli Tec cocinamos con amor y dedicación para nuestros niños.</p>
                </div>

                <div class="col-md-8 top-margin">
                    <a href="{{route('gallery',['gallery' => 'deliTEC'])}}" class="btn btn-lg btn-primary btn-admission">
                        <span>Galería DeliTEC</span>
                    </a>
                </div>
                <div class="col-md-4 top-margin">
                    <a target="_blank" href="{{ !empty($menu->path)?  url('/') . "/" .  $menu->path :'#' }}"  class="btn btn-lg btn-warning btn-admission">
                        Menú
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
