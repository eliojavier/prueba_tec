@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 top-margin">
                <img class="img-responsive round-border" src={{asset('img/levels/Nivel3.png')}} alt="Nosotros">
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
                                &nbsp;Entre 4 y 5 años
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
            <h2 class="text-primary top-margin">Nivel III</h2>
            <hr class="hr-primary">

            <div class="col-md-8">
                <p>En el <strong>Nivel III</strong> continuamos trabajando con nuestro programa bilingue, en cada uno de los salones contamos con dos mae-stras licenciadas, una maestra de español y una maestra de inglés fija durante toda la rutina.
                </p>
                <p>En español los iniciamos en el proceso  de lecto-escritura de una manera más formal y continuamos trabajando el pensam-iento lógico matemático.</p>
                <p>En Inglés continuamos con  "Phonics", following instructions ac-tivities, math, reading and comprehension program. Durante nuestra rutina bilingue hacemos énfasis  en el orden, la respon-sabilidad, la toma de decisiones, la resolución de problemas, la confianza en sí mismo y los iniciamos en la responsabilidad de sus tareas.</p>
                <p>Una vez a la semana tienen clases  de Música y Computer en las pantallas interactivas   "smart boards", en donde reforzamos los objetivos de inglés.</p>
            </div>
            <div class="col-md-4">
                <img class="img-responsive round-border" src={{asset('img/levels/Nivel3_2.png')}} alt="Nosotros">

            </div>
        </div>
        @include('levels.partials._buttons',['levelText' => 'Nivel 3'])

    </div>
@endsection
