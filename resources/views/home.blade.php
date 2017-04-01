@extends('layouts.app')

@section('title', 'News Tracker')

@section('content')
<div class="container">
    <div class="row">
        @if (count($posts) > 0)
        <div class="col-sm-9">
        	@include('shared.posts', ['posts' => $posts])
        </div>
        <div class="col-sm-3">
        @if (count($newspapers) > 0)
        @include('sidebar.newspapers', ['newspapers' => $newspapers])
        @endif
        </div>
        @else
        <div class="col-md-8 col-md-offset-2">
        	<p class="lead">No hay entradas públicadas.</p>
        </div>
        @endif
    </div><!-- .row -->
</div><!-- .container -->
@endsection
