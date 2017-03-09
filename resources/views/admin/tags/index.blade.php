@extends('layouts.admin')
@section('title', 'Tags')
@section('content.admin')
<div class="panel panel-default">
	<div class="panel-body">
		<a href="{{ route('admin_tag_create') }}" class="btn btn-success" role="button"><span class="glyphicon glyphicon-plus"></span> Create</a>
		@if (count($tags) > 0)
		<div class="table-responsive">
			<table class=table>
				<thead>
					<tr>
						<th>Name</th>
						<th>Articles</th>
						<th>Slug</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($tags as $tag)
					<tr>
						<td>{{ $tag->name }}</td>
						<th scope=row>{{ count($tag->articles) }}</th>
						<td>{{ $tag->slug }}</td>
						<th class="text-right"><a href="{{ route('admin_tag_edit', ['id' => $tag->id]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></th>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
			{{ $tags->links() }}
			</div>
		</div><!-- .table-responsive -->
		@endif
	</div>
</div>
@endsection