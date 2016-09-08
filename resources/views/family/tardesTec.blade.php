@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12 top-margin">
                <img class="img-responsive round-border" src="{{asset('img/tardesTec.jpg')}}" alt="Nosotros">
            </div>
            <div class="col-md-4 top-margin">
                <img class="img-responsive center round-border" src="{{asset('img/TardesTEC.png')}}" alt="baby gym">
            </div>
            <div class="col-md-8 top-margin">
                <hr class="hr-danger" style="margin-top: 75px"/>
            </div>
            <div class="col-md-12 top-margin">
                <p>
                    <strong>TardesTEC</strong> surge como respuesta a la inquietud de los padres en ofrecer a sus hijos una atención integral “después del colegio”, que no solo cubra las necesidades de acompañamiento académico, sino que además, ofrezca un ambiente único y divertido, en donde interactúen con niños de dife-rentes edades, desarrollando virtudes y hábitos como: responsabilidad, amistad, ingenio, creativi-dad y destrezas deportivas.
                </p>
                <p>
                    El programa está creado y pensado específicamente para niños en edades comprendidas entre los 3 y 6 años. (o en su defecto que ya controlen esfínteres) Su enfoque se encuentra dirigido al acompañamiento académico, iniciación artística musical y desarrollo de disciplinas como ballet, fútbol y taekwon-do.
                </p>
                <p>Los niños que asisten a Tardes TEC encuentran un segundo hogar que satisface sus necesidades individuales y que los impulsa a ser mejores y a sentirse parte de un grupo</p>
                <h3 class="text-primary" style="font-family: 'Strawberry Muffins',sans-serif">
                    ¿Cómo contribuye Tardes TEC en satisfacer las necesidades de sus hijos?
                </h3>
                <ul style="font-size: 12pt">
                    <li> Dándoles la oportunidad única de vivir y de aprender junto a otros niños de diferentes edades          en un entorno atractivo, distinto y divertido.</li>
                    <li> Permitiéndoles enriquecer y reforzar aprendizajes, ofreciéndoles un espacio y un momento               para desarrollar intereses y relaciones, así como también, explorar actividades nuevas que los          haga desarrollar capacidades ocultas o desconocidas.</li>
                    <li>  Ofreciéndoles un tiempo de relajarse, de estirar sus cuerpos y mentes y de practicar disciplI             nas que los ayudarán a formarse como seres integrales, no sólo desarrollando sus habilidades          físicas sino también a través del reforzamiento de hábitos.</li>
                </ul>
            </div>

            <div class="row top-margin">
                <div class="col-md-8">
                    <a target="_blank" href="{{ !empty($register->path)?  url('/') . "/" .  $register->path :'#' }}" class="btn btn-lg btn-primary btn-calendar">
                        Planilla de Inscripción
                    </a>
                </div>
                <div class="col-md-4">
                    <a target="_blank" href="{{ !empty($activities->path)?  url('/') . "/" . $activities->path :'#' }}" class="btn btn-lg btn-danger btn-admission">
                       Actividades
                    </a>
                </div>
            </div>
            <div class="row col-md-offset-8 top-margin">
                <div class="col-md-6">
                    <a href="{{route('gallery',['gallery' => 'tardesTec']) }}" class="btn btn-lg btn-primary btn-admission">
                        Galería
                    </a>
                </div>
                <div class="col-md-6">
                    <a target="_blank" href="{{ !empty($files->path)?  url('/') . "/" .  $files->path :'#' }}" class="btn btn-lg btn-warning btn-admission">
                        Archivos
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
