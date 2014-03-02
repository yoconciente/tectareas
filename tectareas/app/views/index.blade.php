@extends('layout')

@section('title')
    Inicio
@stop

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Tectareas</h1>
            @if(Auth::check())
                <p>Comparte tus recursos, pregunta y responde. Ademas puedes ver tu perfil y modificar tu información.</p>
                <p><a href="#" class="btn btn-primary btn-lg">Ver mi perfil &raquo;</a></p>
            @else
                <p>Registrate en Tectareas para que puedas compartir tus recursos y preguntar a la comunidad tus dudas.</p>
                <p><a href="{{ URL::to('sign-up') }}" class="btn btn-primary btn-lg">Registrarme &raquo;</a></p>
            @endif
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
