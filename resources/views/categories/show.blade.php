@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container"> 
	@include('shared.posts-2', ['posts' => $posts, 'paginate' => true])
</div>
@endsection
