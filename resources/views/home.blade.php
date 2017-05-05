@extends('layouts.app')

@section('title', 'Cablera Online')

@section('content')
<div class="row">
    <section class="col-sm-9">
    @if ($posts->count() > 0)
    	@include('shared.posts', ['posts' => $posts])
    @else
    	<p class="lead">No hay entradas públicadas.</p>
    @endif
    </section>
    <div class="col-sm-3">
    @if (count($newspapers) > 0)
    @include('sidebar.newspapers', ['newspapers' => $newspapers])
    @endif
    </div>
</div><!-- .row -->
@endsection
