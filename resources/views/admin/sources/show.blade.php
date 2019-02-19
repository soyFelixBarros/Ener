@extends('layouts.base')

@section('title', $source->name)

@section('content.base')
<div class="card">
	<div class="card-header clearfix">
		<div class="float-left">
			<h5 class="mt-1 mb-1">Fuente: {{ $source->name }}</h5>
		</div>
		<div class="float-right">
			{{-- <a href="#" class="btn btn-light btn-sm" role="button">Filtros</a>	 --}}
		</div>
	</div>
	<div class="card-body">
		@if ($source->links->count() > 0)
		<div class="table-responsive">
			<table class="table table-sm">
				<thead class="table table-striped">
					<tr>
						<th>Url</th>
						<th>Activo</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($source->links as $link)
					<tr>
						<td><a href="{{ route('admin.links.show', ['id' => $link->id]) }}">{{ $link->url }}</a></td>
						<td>{{ $link->active ? 'Si' : 'No' }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div><!-- .table-responsive -->
		@endif
	</div>
</div>
@endsection