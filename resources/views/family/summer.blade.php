@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12 top-margin">
                <img class="img-responsive round-border" src="{{asset('img/summer.jpg')}}" alt="Nosotros">
            </div>
            <div class="col-md-6 top-margin">
                <img class="img-responsive center round-border" src="{{asset('img/SummerCAMP.png')}}" alt="Summer Camp">

            </div>
            <div class="col-md-6 top-margin">
                <hr class="hr-primary" style="margin-top: 75px"/>
            </div>
            <div class="row top-margin">
                <div class="col-md-12">
                    <h3 style="font-family: 'Strawberry Muffins', sans-serif">
                        Join us in our four weeks SUMMER CAMP!
                    </h3>
                    <p>
                        Our goal is to provide a fun, memorable experience for your child in a safe and supervised environment...
                    </p>
                    <p>
                        In the Summer Camp your child will experience a variety of exciting activities, they will be grouped by age to provide a safe and fun camp experience:
                    </p>
                    <ul style="font-size: 12pt">
                        <li>Mini Tatankas (2 years old) **only for actual TEC students</li>
                        <li>Little Tatankas (3 years old)</li>
                        <li> Kowabungas (from 4-5 years old)</li>
                        <li> Kilimanjaros (6 years old)</li>
                    </ul>
                    <hr class="list-dashed"/>
                    <p>
                        Each group will enjoy different activities according to their ages. These are some of our fun activities:
                    </p>
                    <h4 style="font-family: 'Strawberry Muffins', sans-serif">
                        At the Zoo Week
                    </h4>
                    <p>Fun activities, silly games, nature crafts and more; get ready to meet the petting farm (real ani-mals will visit us). Let your imagination run wild!</p>
                    <h4 style="font-family: 'Strawberry Muffins', sans-serif">
                        Artistic Week
                    </h4>
                    <p>
                        Be an artist by painting a big mural with your friends, learn to make craft balloons, papiermache, play clay and different art and craft techniques. We will make awesome creations!
                    </p>
                    <h4 style="font-family: 'Strawberry Muffins', sans-serif">
                        Acquarium Week
                    </h4>
                    <p>
                        Have an ocean of a time playing fun games, making crafts and having fishing and wet activities. Be aware because we’ll be topping off the week with an awesome water splash party. Be ready to get a little wet!
                    </p>
                    <h4 style="font-family: 'Strawberry Muffins', sans-serif">
                        Olympic & Sports Week
                    </h4>
                    <p>All the fun of a summer olympic festival wrapped into one week. Plan, create, and show off your group’s super picnic with sports, entertainment and fun!</p>
                    <h4 style="font-family: 'Strawberry Muffins', sans-serif">
                        For all weeks:
                    </h4>
                    <p>
                        We will play in the barnyard playground, Safari park and learn a lot of fun new songs, have story-telling times and much much more surprises!
                    </p>

                </div>
                <div class="col-md-4 top-margin">
                    <a href="{{route('gallery',['gallery' => 'summer'])}}" class="btn btn-lg btn-danger btn-admission">
                        <span>Galería</span>
                    </a>
                </div>
                <div class="col-md-4 top-margin">
                    <a href="{{ !empty($menu->path)?  url('/') . "/" .  $menu->path :'#' }}" class="btn btn-lg btn-primary btn-admission">
                        Menú
                    </a>
                </div>

                <div class="col-md-4 top-margin">
                    <a href="#" class="btn btn-lg btn-primary  btn-admission">
                        Inscripción
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
