@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8  top-margin">
                <img class="img-responsive round-border" src={{asset('img/levels/Nivel1.png')}} alt="Nosotros">
            </div>
            <div class="col-md-4 top-margin">
                <div class="panel panel-primary" style="border-color: #e0e0e0">
                    <div class="panel-body panel-body-tec  panel-level">
                        <ul class="list-unstyled ">
                            <li class="top-margin">
                                <span class="icon-Periodo icons pull-left"></span>

                                <strong>	&nbsp;PERÍODO</strong>

                                <br/>
                                    &nbsp;Oct 2015 - Jul 2016
                                <hr class="list-dashed">
                            </li>
                            <li class="top-margin">
                                <span class="icon-Edades icons pull-left"></span>
                                <strong>	&nbsp;EDADES:</strong>

                                <br/>
                                &nbsp;Entre 2 y 3 años
                                <hr class="list-dashed">
                            </li>
                            <li class="top-margin">
                               <span class="icon-Horarios icons pull-left"></span>
                                <strong>	&nbsp;HORARIO:</strong>
                                <br/>
                                &nbsp;8:00am - 12:30pm
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
            <h2 class="text-primary top-margin">Nivel I</h2>
            <hr class="hr-primary">

            <div class="col-md-8">
                <p>
                    Comenzamos nuestro  Nivel I a  partir de los 2 años cumplidos, haciendo énfasis en el lenguaje, reforzando las normas, hábitos de trabajo y  la virtud del orden.
                </p>
                <p>
                    A partir de este nivel empezamos la  <strong>rutina bilingue</strong> contando durante toda la mañana con una maestra de español, una de inglés, ambas licenciadas y una puericultora.
                </p>
                <p>Los iniciamos en el  control de esfínteres.</p>
                <p>Dos veces a la semana tienen clases de música.</p>
            </div>
            <div class="col-md-4">
                <img class="img-responsive round-border" src={{asset('img/levels/Nivel1_2.png')}} alt="Nosotros">

            </div>
        </div>
        @include('levels.partials._buttons',['levelText' => 'Nivel 1'])
    </div>
@endsection
