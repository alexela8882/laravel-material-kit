@extends('layouts.app')

@section('content')
<div class="section section-full-screen section-signup" style="background-image: url('assets/img/city.jpg'); background-size: cover; background-position: top center; min-height: 700px; background-attachment: fixed;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="card card-signup">
                    <form class="form" method="post" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="header header-primary text-center">
                            <h4>Sign Up</h4>
                            <div class="social-line">
                                <a href="{{ url('register') }}" data-toggle="tooltip" title="Local" data-placement="top" class="btn btn-simple btn-just-icon btn-tooltip">
                                    <i class="fa fa-desktop"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" title="Facebook" data-placement="top" class="btn btn-simple btn-just-icon btn-tooltip">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" title="Twitter" data-placement="top" class="btn btn-simple btn-just-icon btn-tooltip">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" title="Google+" data-placement="top" class="btn btn-simple btn-just-icon btn-tooltip">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <p class="text-divider">or Log In</p>
                        <div class="content">

                            <!-- <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <input type="text" class="form-control" placeholder="First Name...">
                            </div> -->
                            
                            <div class="input-group {{ $errors->has('email') ? 'form-group has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control has-error" placeholder="Email...">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            

                            <div class="input-group {{ $errors->has('password') ? 'form-group has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input type="password" name="password" placeholder="Password..." class="form-control" />
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- If you want to add a checkbox to this form, uncomment this code -->

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="rememberToken">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button class="btn btn-simple btn-primary btn-lg">Get Started</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
