@extends('layouts.admin')
@section('title', 'Posts')
@section('content.admin')
<div class="card">
	<div class="card-body">
	@include('shared.posts-large', ['posts' => $posts])
	</div>
</div>
@endsection