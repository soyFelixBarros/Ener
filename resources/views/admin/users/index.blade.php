@extends('layouts.admin')

@section('title', $title)

@section('content.admin')
<div class="card">
	<div class="card-header clearfix">
		<div class="float-left">
		<h5 class="mt-1 mb-1">{{ $users->count() }} {{ $title }}</h5>
		</div>
	</div><!-- .card-header -->
	<div class="card-body">
		@if ($users->count() > 0)
		<div class="table-responsive">
			<table class='table table-sm'>
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Correo electrónico</th>
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
	</div><!-- .card-body -->
</div><!-- .card -->
@endsection