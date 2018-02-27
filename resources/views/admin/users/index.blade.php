@extends('layouts.admin')
@section('title', 'Users')
@section('content.admin')
<div class="card">
	<div class="card-header clearfix">
		<div class="float-left">
			<h5 class="mt-1 mb-1">Usuarios</h5>
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