@extends('layouts.admin')
@section('title', 'Users')
@section('content.admin')
<div class="panel panel-default">
	<div class="panel-body">
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