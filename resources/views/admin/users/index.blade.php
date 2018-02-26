@extends('layouts.admin')
@section('title', 'Users')
@section('content.admin')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-10">
				<h3>Users</h3>
			</div>
			<div class="col-md-2 text-right">
				<a href="#" class="btn btn-success" role="button"><span class="glyphicon glyphicon-plus"></span> Create</a>	
			</div>
		</div>
	</div>
	<div class="card-body">
		@if (count($users) > 0)
		<div class="table-responsive">
			<table class=table>
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($users as $user)
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->role->slug }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
			{{ $users->links() }}
			</div>
		</div><!-- .table-responsive -->
		@endif
	</div>
</div>
@endsection