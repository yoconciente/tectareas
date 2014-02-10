@extends('layout')

@section('title')
    Registro
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Registro</h2>

            @if(Session::get('msg'))
                <p>{{ Session::get('msg') }}</p>
            @endif

            {{ Form::open(array('url' => '/sign-up', 'method' => 'POST', 'role' => 'form')) }}
                <div class="form-group">
                    {{ Form::label('name', 'Nombre:') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Correo Electronico:') }}
                    {{ Form::text('email', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Contraseña:') }}
                    {{ Form::password('password', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password2', 'Vuelve a escribir la Contraseña:') }}
                    {{ Form::password('password2', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('university', 'Universidad/Institución:') }}
                    {{ Form::text('university', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('profession', 'Profesión:') }}
                    {{ Form::select('profession', array(), null, array('class' => 'form-control')) }}
                    <div id="other">
                        {{ Form::label('profession2', 'Otra:') }}
                        {{ Form::text('profession2', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('github_user', 'Usuario en github:') }}
                    {{ Form::text('github_user', null, array('class' => 'form-control')) }}
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="checkbox">
                            {{ Form::label('agree', 'Acepto los terminos y condiciones') }}
                            {{ Form::checkbox('agree', '1', false) }}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <p>Texto del aviso de privacidad...</p>
                    </div>
                </div>
                {{ Form::submit('Registrarme', array('class' => 'col-md-12 btn btn-success')) }}
            {{ Form::close() }}
        </div>
    </div>
@stop
