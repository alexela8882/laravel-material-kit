@extends('layouts.app')

@section('content')
<div class="main main-raised">
	<div class="container">
		<h2 class="title">Users</h2>

		<a href="{{ url('user/create') }}" class="">Register new user</a>
		<p></p>

		<div class="table table-responsive">
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th style="width: 150px;">Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $index => $user)
						<tr>
							<td>{{ $index + 1 }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								<a href="" class="btn btn-simple btn-xs btn-primary btn-icon-only"><i class="fa fa-edit"></i></a>
								<a href="" class="btn btn-simple btn-xs btn-danger btn-icon-only"><i class="fa fa-remove"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection