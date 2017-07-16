@extends('layouts.admin')
@section('title', 'Newspapers')
@section('content.admin')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-10">
				<h3>Newspapers</h3>
			</div>
			<div class="col-md-2 text-right">
				<a href="{{ route('admin_newspapers_create') }}" class="btn btn-success" role="button"><span class="glyphicon glyphicon-plus"></span> Create</a>	
			</div>
		</div>
	</div>
	<div class="panel-body">
		@if (count($newspapers) > 0)
		<div class="table-responsive">
			<table class=table>
				<thead>
					<tr>
						<th>Name</th>
						<th class="text-center">Post</th>
						<th>Province</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($newspapers as $newspaper)
					<tr>
						<td>{{ $newspaper->name }}</td>
						<th scope=row class="text-center">{{ count($newspaper->posts) }}</th>
						<td>{{ $newspaper->province->name }}</td>
						<th class="text-right">
							<a href="{{ route('admin_scrapers_edit', ['id' => $newspaper->scraper->id]) }}" class="text-muted"><span class="glyphicon glyphicon-open-file" aria-hidden="true"></span></a> 
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