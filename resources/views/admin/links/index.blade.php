@extends('layouts.admin')
@section('title', 'Links')
@section('content.admin')
<div class="card">
	<div class="card-header clearfix">
		<div class="float-left">
			<h5 class="mt-1 mb-1">Enlaces</h5>
		</div>
		<div class="float-right">
			<a href="{{ route('admin_links_create') }}" class="btn btn-success btn-sm" role="button" title="Agregar enlace"><i class="fas fa-plus"></i></a>
		</div>
	</div>
	<div class="card-body">
		@if (count($links) > 0)
		<div class="table-responsive">
			<table class="table table-sm">
				<thead>
					<tr>
						<th></th>
						<th>Url</th>
						<th>Acción</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($links as $link)
					<tr>
						<th class="text-left{{ $link->active ? ' text-success' : ' text-danger' }}"><i class="fa fa-circle" aria-hidden="true"></i></th>
						<td><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td>
						<th class="text-right">
							<a href="{{ route('admin_links_delete', ['id' => $link->id]) }}" class="text-danger"><i class="far fa-trash-alt"></i></a>
							<a href="{{ route('admin_links_edit', ['id' => $link->id]) }}"><i class="far fa-edit"></i></a>
						</th>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
			{{ $links->links() }}
			</div>
		</div><!-- .table-responsive -->
		@endif
	</div>
</div>
@endsection