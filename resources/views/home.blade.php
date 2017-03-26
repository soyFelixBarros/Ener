@extends('layouts.app')

@section('title', 'Noticas')

@section('content')
<div class="container">
    <div class="row">
        @if (count($articles) > 0)
        <div class="col-sm-9">
        	@include('shared.articles', ['articles' => $articles])
        </div>
        <div class="col-sm-3">
        @if (count($newspapers) > 0)
        @include('sidebar.newspapers', ['newspapers' => $newspapers])
        @endif
        </div>
        @else
        <div class="col-md-8 col-md-offset-2">
        	<p class="lead">No hay noticias para {{ $state }}, {{ $country }}</p>
        </div>
        @endif
    </div><!-- .row -->
</div><!-- .container -->
@endsection
