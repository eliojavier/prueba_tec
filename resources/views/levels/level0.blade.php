@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 top-margin">
                <img class="img-responsive round-border" src={{asset('img/levels/Nivel0BabyTEC.png')}} alt="Nosotros">
            </div>
            <div class="col-md-4 top-margin">
                <div class="panel panel-primary" style="border-color: #e0e0e0">
                    <div class="panel-body panel-body-tec panel-level">
                        <ul class="list-unstyled ">
                            <li class="top-margin">
                                <span class="icon-Periodo icons pull-left"></span>

                                <strong>	&nbsp;PERÍODO</strong>

                                <br/>
                                    &nbsp;Sept 2016 - Jul 2017
                                <hr class="list-dashed">
                            </li>
                            <li class="top-margin">
                                <span class="icon-Edades icons pull-left"></span>
                                <strong>	&nbsp;EDADES:</strong>

                                <br/>
                                &nbsp;Entre 1 y 2 años
                                <hr class="list-dashed">
                            </li>
                            <li class="top-margin">
                               <span class="icon-Horarios icons pull-left"></span>
                                <strong>	&nbsp;HORARIO:</strong>
                                <br/>
                                &nbsp;8:00am - 1:00pm
                                <hr class="list-dashed">
                            </li>
                            <li class="top-margin">
                                <span class="icon-Idiomas icons pull-left"></span>
                                <strong>	&nbsp;IDIOMAS:</strong>
                                 <br/>
                                &nbsp;Español e Inglés
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h2 class="text-primary top-margin">Baby TEC</h2>
            <hr class="hr-primary">

            <div class="col-md-8">
                <p>
                    Baby TEC
                </p>
                <p>Nuestro objetivo es que se adapten y disfruten esta nueva experiencia .</p>
                <p>Los iniciamos en la virtud del orden a través de canciones y juegos, ya que ésta es la base de las demás virtudes.</p>
                <p> Contamos con dos maestras graduadas y una puericultora durante toda la rutina. Dos veces a la semana tienen clases de música.</p>
            </div>
            <div class="col-md-4">
                <img class="img-responsive round-border" src={{asset('img/levels/Nivel0BabyTEC_2.png')}} alt="Nosotros">

            </div>
        </div>
        @include('levels.partials._buttons',['levelText' => 'Baby TEC'])
    </div>
@endsection
