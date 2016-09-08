@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 top-margin">
                <h2 class="text-primary">Equipo Docente</h2>
                <hr class="hr-primary">
                <p>
                    Con un equipo docente con gran mística y en formación integral continua, queremos ser educadores creativos para lograr que nuestros alumnos se desarrollen con su estilo persona.
                </p>
                <p>
                    El proceso de enseñanza exige unidad entre padres y educadores, de manera que la participación activa de la familia es fundamental para potenciar sus períodos sensitivos y adquirir hábitos buenos, valores y principios.
                </p>
            </div>
            <div class="col-md-12 top-margin">
                <img class="img-responsive round-border" src="{{asset('img/team.jpg')}}" alt="Nosotros">
            </div>
        </div>
    </div>
@endsection
