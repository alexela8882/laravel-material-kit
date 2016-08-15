@extends('layouts.app')

@section('content')
<div class="main main-raised">
	{!! Toastr::render() !!}
	<div class="container">
		<h3 class="title">Register new User</h3>

		<form class="form" action="{{ url('users/store') }}" method="post">
			{{ csrf_field() }}

			<div class="row">
				<div class="col-md-6">
					<div class="form-group label-floating {{ $errors->has('name') ? 'has-error' : '' }}">
						<label class="control-label" for="name">Name</label>
						<input type="text" name="name" value="{{ old('name') }}" class="form-control">

						@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group label-floating {{ $errors->has('email') ? 'has-error' : '' }}">
						<label class="control-label" for="email">E-mail</label>
						<input type="email" name="email" value="{{ old('email') }}" class="form-control">

						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group label-floating {{ $errors->has('password') ? 'has-error' : '' }}">
						<label class="control-label" for="password">Password</label>
						<input type="password" name="password" class="form-control">

						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group label-floating {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
						<label class="control-label" for="password_confirmation">Confirm Password</label>
						<input type="password" name="password_confirmation" class="form-control">

						@if ($errors->has('password_confirmation'))
							<span class="help-block">
								<strong>{{ $errors->first('password_confirmation') }}</strong>
							</span>
						@endif
					</div>
				</div>
			</div>
			

			<div class="row">
				@if (Auth::user()->role === 2)
					<div class="col-md-6">
						<div class="form-group">
							<label for="role">Role</label>
							<select class="form-control" name="role">
								<option value="0">User</option>
								<option value="1">Administrator</option>
								<option value="2">Super Admin</option>
							</select>
						</div>
					</div>
				@endif
			</div>						

			<div class="form-group">
				<button class="btn btn-raised btn-primary">Register</button>
			</div>
		</form>
		<p><br></p>
	</div>
</div>
@endsection