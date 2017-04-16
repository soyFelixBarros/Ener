@extends('layouts.app')

@section('title', 'News Tracker')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9">
        @if (count($posts) > 0)
        	@include('shared.posts', ['posts' => $posts])
        @else
        	<p class="lead">No hay entradas públicadas.</p>
        @endif
        </div>
        <div class="col-sm-3">
        @if (count($newspapers) > 0)
        @include('sidebar.newspapers', ['newspapers' => $newspapers])
        @endif
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection
