<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{URL::asset('public/icons/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Monitool') }}</title>

    <!-- Styles -->
    
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <link href="{{URL::asset('public/css/graph.css') }}" rel="stylesheet">
    <link href="{{URL::asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{URL::asset('public/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{URL::asset('public/css/global.css') }}" rel="stylesheet">

    <!-- Scripts -->
    
    <script src="{{URL::asset('public/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{URL::asset('public/js/dashboard.js') }}"></script>
    <script src="{{URL::asset('public/js/app.js') }}"></script>

    @yield('style')

    @yield('scripts')

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->   
                    <a class="navbar-brand" href="{{ url('/dashboard') }}">
                        <!---{{ config('app.name', 'Laravel') }}-->
                        <img src="{{URL::asset('public/img/logo-monitool.png') }}" alt="Monitool brand">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

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
                                    <li>
                                    <a class="dashboard-link" href="{{ url('/dashboard') }}">Dashboard</a>
                                    </li>
                                    <li>
                                    <a class="" href="{{ url('/account-settings') }}">Account settings</a>
                                    </li>
                                    <li>
                                        <a class="dashboard-link" href="{{ url('/options') }}">Project settings</a>
                                    </li>
                                    <li>
                                        <a class="dashboard-link" href="{{ url('/help') }}">Help</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="https://www.amcharts.com/lib/3/serial.js"></script>
        <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
        <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
        <script src="./resources/assets/js/Chart.js"></script>
        @yield('content')
    </div>
</body>
</html>
