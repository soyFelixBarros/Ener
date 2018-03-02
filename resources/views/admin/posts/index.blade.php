@extends('layouts.admin')
@section('title', $title)
@section('content.admin')
<div class="card">
	<div class="card-header clearfix">
		<div class="float-left">
			<h5 class="mt-1 mb-1">{{ $posts->count() }} {{ $title }}</h5>
		</div>
	</div>
	<div class="card-body">
	@include('shared.posts', ['posts' => $posts, 'type' => 'large', 'paginate' => true, ])
	</div>
</div>
@endsection