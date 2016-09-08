@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>{{ $user->full_name }}</strong>
                    </div>
                    <div class="panel-body">
                         <div class="row">
                            <div class=" col-md-10 col-lg-offset-1 ">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Correo:</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Télefono:</td>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Fecha de registro:</td>
                                            <td>{{ $user->created_at->format('m/d/Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Representados:</td>
                                            <td>{{ $user->children }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
