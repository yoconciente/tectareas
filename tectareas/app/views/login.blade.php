@extends('layout')
 
@section('title')
    Inicio
@stop
 
@section('content')
    <h2>Identificarse</h2>
 
    @if(Session::get('msg'))
        <p>{{ Session::get('msg') }}</p>
    @endif
 
    {{ Form::open(array('url' => '/login', 'method' => 'POST')) }}
        <div class="form-group">
            {{ Form::label('username', 'E-Mail') }}
            {{ Form::text('email') }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Contraseña:') }}
            {{ Form::password('password') }}
        </div>
        {{ Form::submit('Entrar') }}
    {{ Form::close() }}
@stop
