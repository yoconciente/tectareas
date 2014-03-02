<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <title>@yield('title') | Tectareas</title>
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/styles.css') }}
    {{ HTML::script('js/jquery-1.10.2.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Tectareas</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Inicio</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                @if(Auth::check())
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class='active'><a href="#">Bienvenido {{ Auth::user()->email; }}</a></li>
                        <li class='active'><a href="{{ URL::to('/logout') }}">Cerrar sesión</a></li>
                    </ul>
                </div>
                @else
                {{ Form::open(array('url' => '/login', 'method' => 'POST', 'role' => 'form', 'class' => 'navbar-form navbar-right')) }}
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Contraseña')) }}
                    </div>
                    {{ Form::submit('Entrar', array('class' => 'btn btn-success')) }}
                {{ Form::close() }}
                @endif
            </div><!--/.navbar-collapse -->
        </div>
    </div>

    @yield('jumbotron')

    <div class="container">
        @yield('content')
        <hr>
        <footer>
            <p>&copy; yoconciente</p>
        </footer>
    </div>
</body>
</html>
