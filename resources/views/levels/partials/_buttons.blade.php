<div class="row top-margin">
    <div class="col-md-8">
        <a target="_blank" href="{{ !empty($calendar->path)?  url('/') . "/" .  $calendar->path :'#' }}" class="btn btn-lg btn-primary btn-calendar">
            <span>Calendario Escolar 2016 - 2017</span>
            <i class="fa fa-calendar-check-o fa-3x" aria-hidden="true"></i>
        </a>
    </div>
    <div class="col-md-4">
        <a target="_blank" href="{{ !empty($level->path)?  url('/') . "/" . $level->path :'#' }}" class="btn btn-lg btn-danger btn-admission">
            Rutina<br/> {{$levelText}}
        </a>
    </div>
</div>
<div class="row col-md-offset-8 top-margin">
    <div class="col-md-6">
        <a target="_blank" href="{{ !empty($files->path)?  url('/') . "/" .  $files->path :'#' }}" class="btn btn-lg btn-warning btn-admission">
            Archivos
        </a>
    </div>
    <div class="col-md-6">
        <a target="_blank" href="{{ !empty($team->path)?  url('/') . "/" .  $team->path :'#' }}" class="btn btn-lg btn-primary btn-admission">
            Equipo docente
        </a>
    </div>
</div>