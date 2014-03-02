@extends('layout')

@section('title')
    Confirmación
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Confirmación de usuario</h2>

            <h3><strong>Nombre: </strong>{{ $user->name }}</h3>
            <h3><strong>Email: </strong>{{ $user->email }}</h3>
            <h4>Te hemos enviado un correo con un link para que actives tu cuenta Tectareas</h4>
            <br>
            <p>Nota: En caso de que no hallas recibido el correo ponte en contacto con nosotros soporte@tectareas.com</p>
        </div>
    </div>
@stop
