@extends('layouts.admin')
@section('title', 'Posts')
@section('content.admin')
<div class="card">
	<div class="card-body">
	@include('shared.posts', ['posts' => $posts, 'type' => 'large', 'paginate' => true, ])
	</div>
</div>
@endsection