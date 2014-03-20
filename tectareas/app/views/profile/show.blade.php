@extends('layout')

@section('title')
    Perfil Tectareas
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="title center">Mi perfil Tectareas</h2>
            <div class="col-md-6">
                <h4 class="title"><small>email</small> {{ $user->email }}</h4>
                <h4 class="title"><small>nombre</small> {{ $user->name }}</h4>
                <img src="{{ $gravatar }}" style="border-radius: 15px;" />
                <br><br>
                <p><a class="btn btn-primary col-md-9" href="http://gravatar.com/emails/" target="_blank">Cambiar foto de perfil</a></p>
                <br><br>
                <h4 class="title"><small>escuela</small> {{ $user->university }}</h4>
                <h4 class="title"><small>professión</small> {{ $user->profession->name }}</h4>
                <h4 class="title"><small>calificación</small> 100 [badge]</h4>
                <h4 class="title">## RESOURCES</h4>
                <h4 class="title">## QUESTIONS</h4>
                <h4 class="title">## ANSWERS</h4>
                <h4 class="title"><small>registrado el</small> {{ date("d F Y", strtotime($user->created_at)) }}</h4>
                <hr>
                <a data-toggle="modal" href="#desactivate-account" class="col-md-9 btn btn-danger">Desactivar cuenta</a>
                <div class="modal" id="desactivate-account">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Desactivar cuenta</h4>
                            </div>
                            <div class="modal-body">
                                Content for the dialog / modal goes here.
                            </div>
                            <div class="modal-footer">
                                <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
                                <a href="#" class="btn btn-primary">Desactivar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @if(Session::get('message_profile'))
                    <div class="alert alert-success">{{ Session::get('message_profile') }}</div>
                @endif
                {{ Form::model($user, array('url' => '/profile/'.$user->id, 'method' => 'PUT', 'role' => 'form')) }}
                {{ Form::hidden('id') }}
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
                {{ Form::submit('Actualizar Información de Perfil', array('class' => 'col-md-12 btn btn-success')) }}
                {{ Form::close() }}
                <br><br>
                <hr>
                <h4 class="text-center">Cambiar Contraseña</h4>

                @if(Session::get('message_warning'))
                    <div class="alert alert-warning">{{ Session::get('message_warning') }}</div>
                @endif

                @if(Session::get('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif

                {{ Form::open(array('url' => '/profile/'.$user->id.'/change-password', 'method' => 'POST', 'role' => 'form')) }}
                    <div class="form-group">
                        {{ Form::label('password', 'Contraseña actual:') }}
                        {{ Form::password('password', array('class' => 'form-control')) }}
                        @if($errors->has('password'))
                            @foreach($errors->get('password') as $error)
                                <span class="error">*{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('new_password', 'Nueva Contraseña:') }}
                        {{ Form::password('new_password', array('class' => 'form-control')) }}
                        @if($errors->has('new_password'))
                            @foreach($errors->get('new_password') as $error)
                                <span class="error">*{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('new_password2', 'Vuelve a escribir la nueva Contraseña:') }}
                        {{ Form::password('new_password2', array('class' => 'form-control')) }}
                        @if($errors->has('new_password2'))
                            @foreach($errors->get('new_password2') as $error)
                                <span class="error">*{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    {{ Form::submit('Cambiar Contraseña', array('class' => 'col-md-12 btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
