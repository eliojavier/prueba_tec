@extends('layouts.app')

@section('content')

<!-- Header Carousel -->
<div id="myCarousel" class="carousel slide container top-margin">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url('img/slider/slide1.jpg')"></div>
            <div class="carousel-caption">
                <h2>
                    Preescolar TEC
                </h2>
                <p>
                    From small begginings
                    come great things
                </p>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('img/slider/slide2.jpg')"></div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('img/slider/slide3.jpg')"></div>
        </div>

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="left: 15px; border-radius: 8px;">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next" style="right: 15px; border-radius: 8px;">
        <span class="icon-next"></span>
    </a>
</div>

<div class="container top-margin">
    <div class="row">
        @include('pages.partials._buttons')
        <div class="col-md-8">

            <a href="{{url('level', ['id' => '0'])}}">
                <img class="img-responsive top-margin" src="{{asset('img/banner2.jpg')}}" alt=""/>
            </a>

            <a href="{{url('family', ['name' => 'babyGym'])}}"  >
                <img class="img-responsive top-margin" src="{{asset('img/banner1.jpg')}}" alt=""/>
            </a>

            <a href="https://www.portaldepagosmercantil.com/" target="_blank" class="col-md-6 top-margin ">
                <img class="img-responsive center" src="{{asset('img/mercantil.png')}}" alt="Pagos Mercantil"/>
            </a>

            <a href="#" class="col-md-6 top-margin ">
                <img class="img-responsive center" src="{{asset('img/FundaTEC_btn.png')}}" alt="Funda TEC"/>
            </a>


        </div>
        <div class="col-md-4 text-center">
            <div class="panel panel-primary top-margin" style="border-color: #e0e0e0">
                <div class="panel-heading text-center">
                    <h1>
                        Actualidad TEC
                    </h1>
                </div>
                <div class="panel-body panel-body-tec news-height" >
                    @foreach($links as $link)
                        <a target="_blank" href="{{ !empty($link->path)?  url('/') . "/" . $link->path :'#' }}">
                            {{$link->display_name}}
                        </a>
                        <hr>
                    @endforeach
                    @foreach($articles as $article)
                        <a href="{{route('articles.detail',$article)}}">
                           <p class="article-title">
                                {{$article->title}}
                           </p>
                        </a>
                    <hr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 text-center top-margin">
            <div class="same-height">
                <img class="img-responsive center" src="{{asset('img/TardesTEC.png')}}" alt="tardes tec"/>
                <p class="top-margin">
                    TardesTEC ofrece a sus hijos una atención integral “después del colegio”, que no solo cubre las necesidades de acompañamiento académico, sino que además, ofrece un ambiente único y divertido,
                </p>
                <div class="bottom">
                    <a class="btn btn-primary  btn-lg" href="{{url('family', ['name' => 'tardesTec'])}}">
                        Más Información
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center top-margin">
            <div class="same-height">
                <img class="img-responsive center" src="{{asset('img/DeliTEC.png')}}" alt="deli tec"/>
                <p class="top-margin">
                    Deli Tec es la opción para que nuestros niños coman sano y balanceado, incentivándolos a probar e
                    incorporar en su dieta diaria todos aquellos alimentos necesarios para el adecuado desarrollo físico y mental.
                </p>
                <div class="bottom">
                    <a class="btn btn-danger btn-lg" href="{{url('family', ['name' => 'deliTec'])}}">
                        Más Información
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center top-margin">
            <div class="same-height">
                <img class="img-responsive center" src="{{asset('img/partyTecLogo.png')}}" alt="party tec"/>
                <p class="top-margin">
                    Es una alternativa que ofrece la Familia TEC, para que los más pequeños celebren sus cumpleaños juntos a sus compañeros, en el mejor ambiente de nuestro Preescolar.                <div class="bottom">
                    <a class="btn btn-primary btn-lg" href="{{url('family', ['name' => 'partyTec'])}}">
                        Más Información
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center top-margin">
            <div class="same-height">
                <img class="img-responsive center " src="{{asset('img/SummerCampLogo.png')}}" alt="summer camp"/>
                <p class="top-margin rewrite-top-margin">
                    Nuestro Summer Camp tiene como objetivo brindarles diversión y experiencias memorables a los más pequeños en un ambiente sano y coordinado por profesionales del área.                  </p>
                <div class="bottom">
                    <a class="btn btn-danger  btn-lg" href="{{url('family', ['name' => 'summer'])}}">
                        Más Información
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('after-script-end')
    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    </script>
@endsection