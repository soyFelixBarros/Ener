@extends('layouts.app')

@section('title', $title)

@section('content')
@component('partials.sub-header')
	@slot('title')
	{{ $title }}
	@endslot
	<li><a href="{{ route('newspapers') }}">Diarios</a></li>
    <li class="active">{{ $title }}</li>
@endcomponent

<div class="container"> 
	@include('shared.posts', ['posts' => $posts])
</div>
@endsection
