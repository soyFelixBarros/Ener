@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container"> 
	@include('shared.posts', ['posts' => $posts])
</div>
@endsection
