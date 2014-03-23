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
                    @if($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <span class="error">*{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Correo Electronico:') }}
                    {{ Form::text('email', null, array('class' => 'form-control')) }}
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            <span class="error">*{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Contraseña:') }}
                    {{ Form::password('password', array('class' => 'form-control')) }}
                    @if($errors->has('password'))
                        @foreach($errors->get('password') as $error)
                            <span class="error">*{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('password2', 'Vuelve a escribir la Contraseña:') }}
                    {{ Form::password('password2', array('class' => 'form-control')) }}
                    @if($errors->has('password2'))
                        @foreach($errors->get('password2') as $error)
                            <span class="error">*{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('university', 'Universidad/Institución:') }}
                    {{ Form::text('university', null, array('class' => 'form-control')) }}
                    @if($errors->has('university'))
                        @foreach($errors->get('university') as $error)
                            <span class="error">*{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('profession_id', 'Profesión:') }}
                    {{ Form::select('profession_id', $professions, null, array('class' => 'form-control')) }}
                    @if($errors->has('profession_id'))
                        @foreach($errors->get('profession_id') as $error)
                            <span class="error">*{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('github_user', 'Usuario en github(opcional):') }}
                    {{ Form::text('github_user', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('bitbucket_user', 'Usuario en bitbucket(opcional):') }}
                    {{ Form::text('bitbucket_user', null, array('class' => 'form-control')) }}
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="checkbox">
                            {{ Form::label('agree', 'Acepto los terminos y condiciones') }}
                            {{ Form::checkbox('agree', 'yes', false) }}
                            <br/>
                            @if($errors->has('agree'))
                                @foreach($errors->get('agree') as $error)
                                    <span class="error">*{{ $error }}</span>
                                @endforeach
                            @endif
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
