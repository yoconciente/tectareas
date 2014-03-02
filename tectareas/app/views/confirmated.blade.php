@extends('layout')

@section('title')
    Cuenta Confirmada
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if(Session::get('confirmated'))
                <h2>Has confirmado tu cuenta, intenta iniciar sesión</h2>
            @else
                <h2>Iniciar sesión</h2>
            @endif

            @if(Session::get('msg'))
                <p>{{ Session::get('msg') }}</p>
            @endif

            {{ Form::open(array('url' => '/login', 'method' => 'POST', 'role' => 'form')) }}
                <div class="form-group">
                    {{ Form::label('username', 'E-Mail') }}
                    {{ Form::text('email', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Contraseña:') }}
                    {{ Form::password('password', array('class' => 'form-control')) }}
                </div>
                {{ Form::submit('Entrar', array('class' => 'col-md-12 btn btn-success')) }}
            {{ Form::close() }}
        </div>
    </div>
@stop
