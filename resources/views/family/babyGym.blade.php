@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12 top-margin">
                <img class="img-responsive round-border" src="{{asset('img/babyGymPage.jpg')}}" alt="Nosotros">
            </div>
            <div class="col-md-4 top-margin">
                <img class="img-responsive center round-border" src="{{asset('img/BabyGYM.png')}}" alt="baby gym">

            </div>
            <div class="col-md-8 top-margin">
                <p>
                    <strong>Baby Gym </strong>es una iniciativa de la Familia TEC, enfocada en la estimu-lación temprana, fomentando el desarrollo físico, emocional y del len-guaje, mediante actividades ajustadas a las necesidades evolutivas, académicas e individuales de cada niño.
                </p>
                <p>
                    Nuestro principal objetivo es formar integralmente, cubriendo intere-ses y vivencias de los más pequeños de la familia, en un ambiente especial en el que puedan desarrollar habilidades, virtudes y buenos hábitos, además de iniciarlos en el acercamiento a Papá Dios y a la Virgencita a través de canciones y oraciones.
                </p>
            </div>
            <div class="col-md-12">
                <hr/>
                <h3>Entre los objetivos de Baby Gym, resaltan:</h3>
                <ol style="font-size: 12pt">
                    <li> Fomentar la interacción social de los niños desde temprana edad.</li>
                    <li>Estimular el funcionamiento de las diversas áreas del desarrollo infantil tales como:     Área Cognitiva, área personal y social, área sensorio-motriz y área de lenguaje y comunicación.</li>
                    <li>Propiciar el aprendizaje temprano de normas y pautas de conducta</li>
                </ol>
            </div>
            @include('levels.partials._buttons',['levelText' => 'Baby Gym'])

        </div>
    </div>
@endsection
