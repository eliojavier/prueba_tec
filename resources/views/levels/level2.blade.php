@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 top-margin">
                <img class="img-responsive round-border" src={{asset('img/levels/Nivel2.png')}} alt="Nosotros">
            </div>
            <div class="col-md-4 top-margin">
                <div class="panel panel-primary" style="border-color: #e0e0e0">
                    <div class="panel-body panel-body-tec  panel-level">
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
                                &nbsp;Entre 3 y 4 años
                                <hr class="list-dashed">
                            </li>
                            <li class="top-margin">
                               <span class="icon-Horarios icons pull-left"></span>
                                <strong>	&nbsp;HORARIO:</strong>
                                <br/>
                                &nbsp;8:00am - 12:45pm
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
            <h2 class="text-primary top-margin">Nivel II</h2>
            <hr class="hr-primary">

            <div class="col-md-8">
                <p>
                    En el Nivel II continuamos trabajando con nuestro programa bi-lingue, en cada uno de los salones contamos con dos maestras licenciadas, una maestra de español y una maestra de inglés  fija durante toda la rutina.
                </p>
                <p>En español continuamos haciendo énfasis en el área delenguaje y psicomotricidad fina, además de crear los hábitos de trabajo.</p>
                <p>En inglés continuamos haciendo énfasis en la memorización de  daily songs y daily commands. Durante nuestra rutina bilingue  hacemos énfasis  en el orden, la toma de decisiones, la resolución de problemas, la confianza en sí mismo. </p>
                <p>Una vez a la semana tienen clases  de Música  y Computer en las pantallas interactivas "smart boards", en donde reforzamos los objetivos de inglés</p>
            </div>
            <div class="col-md-4">
                <img class="img-responsive round-border" src={{asset('img/levels/Nivel2_2.png')}} alt="Nosotros">

            </div>
        </div>
        @include('levels.partials._buttons',['levelText' => 'Nivel 2'])
    </div>
@endsection
