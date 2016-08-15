@extends('layouts.app')

@section('content')
{!! Toastr::render() !!}
<div class="main main-raised">
	<div class="section-classic">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<h3 class="title">Edit User <i class="material-icons">edit</i></h3>
					<form class="form" action="{{ url('users/' . $user->id . '/update') }}" method="post">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="id">ID</label>
							<input type="text" name="id" class="form-control" value="{{ $user->id }}" disabled>
						</div>

						<div class="form-group label-floating">
							<label class="control-label" for="name">Name</label>
							<input type="text" name="name" class="form-control" value="{{ $user->name }}">
						</div>

						<div class="form-group label-floating {{ $errors->has('email') ? 'has-error' : '' }}">
							<label class="control-label" for="email">E-mail</label>
							<input type="email" name="email" class="form-control" value="{{ $user->email }}">

							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>

						@if (Auth::user()->role === 2)
							<div class="form-group">
								<label class="label-control" for="role">Role</label>
								<select class="form-control" name="role">
									@if ($user->role === 0)
										<option value="0" selected>User</option>
										<option value="1">Administrator</option>
										<option value="2">Super Admin</option>
									@elseif($user->role === 1)
										<option value="0" >User</option>
										<option value="1" selected>Administrator</option>
										<option value="2" >Super Admin</option>
									@else
										<option value="0" >User</option>
										<option value="1" >Administrator</option>
										<option value="2" selected>Super Admin</option>
									@endif
								</select>
							</div>
						@endif

						<div class="form-group">
							<button class="btn btn-raised btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection