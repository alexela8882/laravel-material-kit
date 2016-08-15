<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Material Kit</title>

    <!--     Fonts and icons     -->
        <link rel="stylesheet" href="{{ URL::asset('fonts/Roboto/roboto.css?family=Roboto:300,400,500,700') }}" />
        <link rel="stylesheet" href="{{ URL::asset('fonts/material-icons.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('font-awesome-4.6.3/css/font-awesome.min.css') }}" />

    <!-- Material Kit -->
        <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('assets/css/material-kit.css') }}" rel="stylesheet"/>
        <link href="{{ URL::asset('assets/css/custom.css') }}" rel="stylesheet"/>
        <!-- End of Material Kit -->

    <!-- Toastr -->
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('bower_components/toastr/toastr.min.css') }}">
      <script type="text/javascript" src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('bower_components/toastr/toastr.min.js') }}"></script>
      <!-- End of Toastr -->

    <!-- Bootstrap Table -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('bower_components/bootstrap-table/dist/bootstrap-table.min.css') }}">
        <!-- End of Bootstrap Table -->

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body class="{{ Request::is('home') ? 'index-page' : 'components-page' }}">

    @if (Auth::check())
        <!-- Navbar Primary  -->
        <nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-primary">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('home') }}">Laravel Material Kit</a>
                </div>

                <div class="collapse navbar-collapse" id="example-navbar-primary">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="{{ Request::is('home') ? 'active' : '' }}">
                            <a href="{{ url('home') }}">
                                <i class="material-icons">home</i> Home
                            </a>
                        </li>
                        @if (Auth::check() && (Auth::user()->role === 1 || Auth::user()->role === 2))
                            <li class="dropdown
                                {{
                                    Request::is('users') ||
                                    Request::is('users/*')
                                    ? 'active' : '' }}">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">settings</i>
                                    Manage
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">Manage Settings</li>
                                    <li class="{{
                                                Request::is('users') ||
                                                Request::is('users/*')
                                                ? 'active' : '' }}">
                                        <a href="{{ url('users') }}">
                                            <i class="material-icons">verified_user</i> Users
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown
                            {{ Request::is('profiles') ||
                                Request::is('profiles/*')
                                ? 'active' : '' }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">account_circle</i>
                                Profile
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">Account Settings</li>
                                <li class="{{ Request::is('profiles') ? 'active' : '' }}"><a href="{{ url('profiles') }}">View Profile</a></li>
                                <li class="{{ Request::is('profiles/changePassword') ? 'active' : '' }}"><a href="{{ url('profiles/changePassword') }}">Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="wrapper">
            <div class="hidden-print header header-filter" style="background-image: url('{{ URL::asset('assets/img/bg2.jpeg') }}');">
                @if (Request::is('home'))
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="brand">
                                    <h1>Material Kit</h1>
                                    <h3>A Badass Material Bootstrap Kit</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif 
            </div>
            @yield('content')
        </div>
    @else
        @yield('content')
    @endif

    <!--   Core JS Files for Material Kit   -->
    <script src="{{ URL::asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/material.min.js') }}"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ URL::asset('assets/js/nouislider.min.js') }}" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="{{ URL::asset('assets/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="{{ URL::asset('assets/js/material-kit.js') }}" type="text/javascript"></script>

    <!-- Bootstrap Table -->
        <script src="{{ URL::asset('bower_components/bootstrap-table/dist/bootstrap-table.js') }}" type="text/javascript" ></script>
        <!-- End of Bootstrap Table -->

    <!-- HighCharts -->
        <script src="{{ URL::asset('bower_components/highcharts/highcharts.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('bower_components/highcharts/highcharts-3d.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('bower_components/highcharts/highmaps.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('bower_components/highcharts/highstock.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('bower_components/highcharts/modules/drilldown.js') }}" type="text/javascript"></script>
        <!-- End of HighCharts -->

    @stack('scripts')

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
