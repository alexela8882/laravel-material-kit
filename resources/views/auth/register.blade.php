@extends('layouts.app')

@section('content')
{!! Toastr::render() !!}
<div class="section section-full-screen section-signup" style="background-image: url('assets/img/city.jpg'); background-size: cover; background-position: top center; min-height: 700px; background-attachment: fixed;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="card card-signup">
                    <form class="form" method="post" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="header header-primary text-center">
                            <h4>Sign Up</h4>
                        </div>
                        <p class="text-divider">or <a href="{{ url('login') }}" data-toggle="tooltip" title="Log In">Log In</a></p>
                        <div class="content">

                            <div class="input-group {{ $errors->has('name') ? 'form-group has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name...">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="input-group {{ $errors->has('email') ? 'form-group has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control has-error" placeholder="Email...">

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

                            <div class="input-group {{ $errors->has('password_confirmation') ? 'form-group has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input type="password" name="password_confirmation" placeholder="Confirm Password..." class="form-control" />

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button class="btn btn-simple btn-primary btn-lg">Register</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection