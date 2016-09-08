@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <h2>Representantes</h2>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#active">Activos</a></li>
            <li><a data-toggle="tab" href="#inactive">Inactivos</a></li>
        </ul>

        <div class="tab-content">
            <div id="active" class="tab-pane fade in active" style="width:100%;">
                <h2 class="page-header">Activos</h2>
                <div class="table-responsive col-lg-12">
                    <table class="table table-bordered" id="active-table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Niño</th>
                            <th>Editar</th>
                            <th>Desactivar</th>

                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div id="inactive" class="tab-pane fade">
                <h2 class="page-header">Inactivos</h2>
                <div class="table-responsive col-lg-12">
                    <table class="table table-bordered" id="inactive-table" style="width:100% !important;">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Niño</th>
                            <th>Editar</th>
                            <th>Activar</th>
                            <th>Borrar</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-script-end')
    <script>
        var active_table = $('#active-table');
        var inactive_table = $('#inactive-table');
        $(function () {
            active_table.DataTable({
                "language": {
                    "url": "/vendor/datatables/spanish.json"
                },
                processing: true,
                serverSide: true,
                ajax: "{!! route('admin.users.active.data') !!}",
                columns: [
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'children', name: 'children'},
                    {data: 'edit', name: 'edit', orderable: false, searchable: false},
                    {data: 'deactivate', name: 'deactivate', orderable: false, searchable: false}
                ]
            });
        });

        $(function () {
            inactive_table.DataTable({
                "language": {
                    "url": "/vendor/datatables/spanish.json"
                },
                processing: true,
                serverSide: true,
                ajax: "{!! route('admin.users.inactive.data') !!}",
                columns: [
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'children', name: 'children'},
                    {data: 'edit', name: 'edit', orderable: false, searchable: false},
                    {data: 'activate', name: 'activate', orderable: false, searchable: false},
                    {data: 'delete', name: 'delete', orderable: false, searchable: false}
                ]
            });
        });

        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
        }

        $(function() {
            active_table.on("click", ".new-window", function(event){
                // your code as is
                event.preventDefault();

                var $this = $(this);
                var windowHeight = $( window ).height(); - (Math.round($( window ).height()*0.40) );
                var windowWidth = $( window ).width() - (Math.round($( window ).width()*0.40));
                var left  = ($(window).width()/2)-(windowWidth/2),
                    top   = ($(window).height()/2)-( windowHeight/2);

                var url = $this.attr("href");
                var windowName = "popUp";
                var windowSize = "width="+windowWidth+", height="+windowHeight+", top="+top+", left="+left;
                window.open(url, windowName, windowSize);
                return false;
            });
        });

        $(function() {
            inactive_table.on("click", ".new-window", function(event){
                // your code as is
                event.preventDefault();

                var $this = $(this);
                var windowHeight = $( window ).height(); - (Math.round($( window ).height()*0.40) );
                var windowWidth = $( window ).width() - (Math.round($( window ).width()*0.40));
                var left  = ($(window).width()/2)-(windowWidth/2),
                        top   = ($(window).height()/2)-( windowHeight/2);

                var url = $this.attr("href");
                var windowName = "popUp";
                var windowSize = "width="+windowWidth+", height="+windowHeight+", top="+top+", left="+left;
                window.open(url, windowName, windowSize);
                return false;
            });
        });

        $( document ).ready(function() {
        });

    </script>
@endsection