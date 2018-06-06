@extends('layouts.admin')
@section('title', $title)
@section('content.admin')
<div class="card">
	<div class="card-header clearfix">
		<div class="float-left">
			<h5 class="mt-1 mb-1">{{ $newspapers->total() }} {{ $title }}</h5>
		</div>
		<div class="float-right">
			<a href="{{ route('admin_newspapers_create') }}" data-toggle="tooltip" data-placement="left" class="btn btn-success btn-sm" role="button" title="Agregar diario"><i class="fas fa-plus"></i></a>	
		</div>
	</div>
	<div class="card-body">
		@if ($newspapers->count() > 0)
		<div class="table-responsive">
			<table class="table table-sm">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Actualizado</th>
						<th class="text-center">Noticia</th>
						<th>Provincia</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($newspapers as $newspaper)
					<tr>
						<td>{{ $newspaper->name }}</td>
						<td><time class="timeago text-lowercase" datetime="{{ $newspaper->posts->last()['created_at'] }}" title="{{ $newspaper->posts->first()['created_at'] }}"></time></td>
						<th scope=row class="text-center">{{ count($newspaper->posts) }}</th>
						<td>{{ $newspaper->province->name }}</td>
						<th class="text-right">
							<a href="{{ route('admin_newspapers_edit', ['id' => $newspaper->id]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						</th>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
			{{ $newspapers->links() }}
			</div>
		</div><!-- .table-responsive -->
		@endif
	</div>
</div>
@endsection