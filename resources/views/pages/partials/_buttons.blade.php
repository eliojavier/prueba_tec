<div class="col-md-8">
    <a target="_blank" href="{{ !empty($calendar->path)?  $calendar->path :'#' }}" class="btn btn-lg btn-primary btn-calendar">
        <span>
            Calendario Escolar 2016 - 2017
        </span>
        <i class="fa fa-calendar-check-o fa-3x" aria-hidden="true"></i>
    </a>
</div>
<div class="col-md-4">
    <a target="_blank" href="{{ !empty($admission->path)?  $admission->path :'#' }}" class="btn btn-lg btn-warning btn-admission">
        Solicitud<br/>
        Pre-Admisión
    </a>
</div>