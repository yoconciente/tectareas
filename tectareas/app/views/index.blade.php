@extends('layout')

@section('title')
    Inicio
@stop

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Tectareas</h1>
            <p>Registrate en Tectareas para que puedas compartir tus recursos y preguntar a la comunidad tus dudas.</p>
            <p><a href="{{ URL::to('sign-up') }}" class="btn btn-primary btn-lg">Registrarme &raquo;</a></p>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <h2>Listado de los ultimos recurss, preguntas y respuestas</h2>
        <div class="col-md-6">
            <h3>Tarea # 324</h3>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-default" href="#">Ver Detalles &raquo;</a></p>
        </div>
        <div class="col-md-6">
            <h3>Pregunta sbre Java 7</h3>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-default" href="#">Ver Detalles &raquo;</a></p>
        </div>
    </div>
@stop
