@extends('layouts.base')

@section('title', 'Fuentes')

@section('content.base')
<div class="card">
	<div class="card-header clearfix">
		<div class="float-left">
			<h5 class="mt-1 mb-1">Fuentes</h5>
		</div>
		<div class="float-right">
			<a href="#" data-toggle="tooltip" data-placement="left" class="btn btn-success btn-sm" role="button" title="Agregar fuente"><i class="fas fa-plus"></i></a>	
		</div>
	</div>
	<div class="card-body">
		@if ($sources->count() > 0)
		<div class="table-responsive">
			<table class="table table-sm">
				<tbody>
					@foreach ($sources as $source)
					<tr>
						<td>{{ $source->name }}</td>
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