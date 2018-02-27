@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container"> 
	<h3 class="mb-4">
		{{ $title }}<br />
		<small class="text-muted">{{ $posts->count() }} noticias</small>
	</h3>
	@include('shared.posts', ['posts' => $posts, 'paginate' => true])
</div>
@endsection
