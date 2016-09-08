@extends('layouts.dashboard')

@section('after-styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <h2 class="page-header">Noticias</h2>
        <div class="table-responsive col-lg-12">
            <table class="table table-bordered" id="events-table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Autor</th>
                    <th>Fecha de publicación</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('after-script-end')
    <script>
        var table = $('#events-table');


        $(document).ready(function() {
            $(function () {
                table.DataTable({
                    "language": {
                        "url": "/vendor/datatables/spanish.json"
                    },
                    processing: true,
                    serverSide: true,
                    ajax: "{!! route('admin.articles.data') !!}",
                    columns: [
                        {data: 'title', name: 'title'},
                        {data: 'author', name: 'author'},
                        {data: 'published_date', name: 'published_date'},
                        {data: 'edit', name: 'edit', orderable: false, searchable: false},
                        {data: 'delete', name: 'delete', orderable: false, searchable: false}
                    ]
                });

                $(function() {
                    table.on("click", ".new-window", function(event){
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

            });
        });
    </script>
@endsection