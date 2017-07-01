@extends('layouts.admin')
@section('title', 'Posts')
@section('content.admin')
<div class="panel panel-default">
{{-- 	<div class="panel-heading">
		<div class="row">
			<div class="col-md-10">
				<h3>Posts</h3>
			</div>
			<div class="col-md-2 text-right">
			</div>
		</div>
	</div> --}}
	<div class="panel-body">
	@include('shared.posts-large', ['posts' => $posts])
	</div>
</div>
@endsection