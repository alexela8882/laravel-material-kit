<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!--     Fonts and icons     -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css" />

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

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">

    @if (Auth::check())
        <div class="wrapper">
            <!-- Navbar Primary  -->
            <nav class="navbar navbar-fixed-top">
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
                            <li><a href="{{ url('home') }}">Home</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">account_circle</i>
                                    Profile
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">Account Settings</li>
                                    <li><a href="#">View Profile</a></li>
                                    <li><a href="#">Change Password</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{ url('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    @endif

    @yield('content')

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

    <script type="text/javascript">

        $().ready(function(){
            // the body of this function is in assets/material-kit.js
            materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

                $(window).on('scroll', materialKitDemo.checkScrollForParallax);
            }

        });
    </script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
