@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 top-margin">
                <img class="img-responsive round-border" src="{{asset('img/about.jpg')}}" alt="Nosotros">
            </div>
            <div class="col-md-12 top-margin">
                <h2 class="text-primary">Nosotros</h2>
                <hr class="hr-primary">
                <div class="row">
                    <div class="col-md-8">
                        <p>
                            Estamos dedicados a motivar y estimular a nuestros niños con actividades que repetidas en el tiempo se transformen en “hábitos buenos” que después se convertirán en virtudes humanas: amistad, orden, laboriosidad, sinceridad, respeto, obediencia, patriotismo, etc.
                        </p>
                        <p>
                            Nos esforzamos en encauzar sus destrezas y habilidades tanto grupales como individuales de manera que el niño de-sarrolle su potencial intelectual, social, emocional y espiritual. En definitiva queremos educar a niños felices que sepan elegir “El Bien”.
                        </p>
                        <p>
                            El Preescolar TEC está concebido como una institución de carácter bilingüe, con énfasis en la enseñanza del  inglés en forma integral, coordinada e intensiva, para que los niños adquieran un conocimiento de la lengua en sus cuatrohabilidades: hablar, escuchar, leer y escribir, a fin de capacitarlos  para que se desempeñen con éxito en esta segunda lengua.
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="panel panel-primary ">
                            <div class="panel-heading text-center">
                                <h1>
                                    ¿Por qué escogernos?
                                </h1>
                            </div>
                            <div class="panel-body panel-body-tec text-left">
                                <ul class="list-unstyled">
                                    <li>
                                        Preparación académica
                                        <hr class="list">
                                    </li>
                                    <li>
                                        Preescolar bilingue
                                        <hr class="list">
                                    </li>
                                    <li>
                                        Formación religiosa
                                        <hr class="list">
                                    </li>
                                    <li>
                                        Equipo joven y actual
                                        <hr class="list">
                                    </li>
                                    <li>
                                        Instalaciones modernas
                                        <hr class="list">
                                    </li>
                                    <li>
                                        Integración de la familia
                                        <hr class="list">
                                    </li>
                                    <li>
                                        Método TEC para el proceso de lecto escritura
                                        <hr class="list">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="panel-body-tec">
        <div class="container">
            <div class="col-md-12 top-margin">
                <h2 class="text-danger">Proyecto Educativo</h2>
                <hr class="hr-danger">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            Nuestro principal objetivo es crear una educación integral orientada a cubrir las necesidades y vivencias de los más pequeños de la familia, en un ambiente maternal donde cada niño pueda desarrollar habili-dades, virtudes y hábitos.                        </p>
                        <p>
                            El Preescolar TEC está concebido como una institución de carácter bilingüe, con énfasis en la enseñanza del idioma inglés en forma integral, coordinada e intensiva, para que los niños adquieran un conocimiento completo y logren  hablarlo, entenderlo, leerlo y escribirlo, a fin de capacitarlos para desempeñarse con eficiencia en cualquier ámbito en el manejo del idioma como una segunda lengua.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacing"></div>
    </div>
    <div class="container top-margin">
        <div class="row">
            @include('pages.partials._buttons')

        </div>
    </div>
@endsection
