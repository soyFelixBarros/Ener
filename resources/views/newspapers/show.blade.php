@extends('layouts.app')

@section('title', $title)

@section('content')
<header>
	<h1>{{ $title }}</h1>
</header>
<hr>
@include('shared.posts', ['posts' => $posts])
@endsection
