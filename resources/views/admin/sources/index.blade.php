@extends('layouts.base')

@section('title', 'Fuentes')

@section('content.base')
<div class="card">
	<div class="card-header clearfix">
		<div class="float-left">
			<h5 class="mt-1 mb-1">Fuentes</h5>
		</div>
		<div class="float-right">
		</div>
	</div>
	<div class="card-body">
		@if ($sources->count() > 0)
		<div class="table-responsive">
			<table class="table table-sm">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Enlaces</th>
						<th>Tax ID</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($sources as $source)
					<tr>
						<td><a href="{{ route('admin.sources.show', $source->id) }}">{{ $source->name }}</a></td>
						<td>{{ $source->links->count() }}</td>
						<td>{{ $source->tax_id }}</td>
						<td class="text-right">
							<a href="{{ route('admin.sources.edit', ['id' => $source->id]) }}"><i class="far fa-edit"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
			{{ $sources->links() }}
			</div>
		</div><!-- .table-responsive -->
		@endif
	</div>
</div>
@endsection