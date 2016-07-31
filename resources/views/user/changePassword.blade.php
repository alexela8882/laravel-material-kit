@extends('layouts.app')

@section('content')
{!! Toastr::render() !!}
<div class="main main-raised">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h3 class="title">Change Password <i class="material-icons">lock</i></h3>

				<form class="form" role="form" action="{{ url('users/updatePassword') }}" method="post">
					{{ csrf_field() }}

					<div class="form-group label-floating {{ $errors->has('oldpassword') ? 'has-error' : '' }}">
						<label class="control-label" for="oldpassword">Old Password</label>
						<input type="password" name="oldpassword" class="form-control">

						@if ($errors->has('oldpassword'))
							<span class="help-block">
								<strong>{{ $errors->first('oldpassword') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group label-floating {{ $errors->has('newpassword') ? 'has-error' : '' }}">
						<label class="control-label" for="newpassword">New Password</label>
						<input type="password" name="newpassword" class="form-control">

						@if ($errors->has('newpassword'))
							<span class="help-block">
								<strong>{{ $errors->first('newpassword') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group label-floating">
						<label class="control-label" for="newpassword_confirmation">Confirm Password</label>
						<input type="password" name="newpassword_confirmation" class="form-control">
					</div>

					<div class="form-group">
						<button class="btn btn-raised btn-primary">Change</button>
					</div>
				</form>
			</div>
			<div class="col-md-12">
				<span class="hrlp-block">
					<strong>Note:</strong> You will be logged out after changing your password.
				</span>
				<p><br></p>
			</div>
		</div>
	</div>
</div>
@endsection