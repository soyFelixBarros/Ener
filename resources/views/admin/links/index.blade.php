@extends('layouts.admin')
@section('title', 'Links')
@section('content.admin')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-10">
				<h3>Links</h3>
			</div>
			<div class="col-md-2 text-right">
			</div>
		</div>
	</div>
	<div class="panel-body">
		@if (count($links) > 0)
		<div class="table-responsive">
			<table class=table>
				<thead>
					<tr>
						<th>Url</th>
						<th>Newspaper</th>
						<th class="text-center">Status</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($links as $link)
					<tr>
						<td><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td>
						<td>{{ $link->newspaper->name }}</td>
						<th scope=row class="text-center{{ $link->status == 200 ? ' text-success' : ' text-danger' }}">{{ $link->status }}</th>
						<th class="text-right">
							<a href="{{ route('admin_scrapers_edit', ['id' => $link->newspaper->scraper->id]) }}" class="text-muted"><span class="glyphicon glyphicon-open-file" aria-hidden="true"></span></a> 
							<a href="{{ route('admin_links_edit', ['id' => $link->id]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
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