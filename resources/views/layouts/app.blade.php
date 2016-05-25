<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Fira+Mono' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Fira Mono';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <strong>l</strong><sup><i class="fa fa-fire"></i></sup><strong>ft</strong>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('profile.index') }}"><i class="fa fa-btn fa-user"></i>profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

@if(!Auth::guest())
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="{{Request::path() == '/' ? 'active' : ''}}">
                        <a href="/">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </a>
                    </li>
                    @foreach($modules as $modules)
                        <li role="presentation" class="{{Request::path() == $modules->name ? 'active' : ''}}">
                            <a href="/{{$modules->name}}">
                                <i class="fa {{$modules->icon}}" aria-hidden="true"></i>
                                {{$modules->name}}
                            </a>
                        </li>
                    @endforeach
                    <li role="presentation" class="{{Request::path() == 'settings' ? 'active' : ''}}">
                        <a href="{{ url('/settings') }}">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <br />
@endif
    @yield('content')

    @if($errors->has())
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="well alert alert-danger" role="alert">
                        <ul class="fa-ul">
                            @foreach($errors->all() as $error)
                                <li><i class="fa-li fa fa-exclamation-triangle fa-fw"></i> {{ $error }} </li>
                            @endforeach
                        </ul>
                </div>
            </div>
        </div>
    @endif

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
