@extends('layouts.app')

@section('title', config('app.name'))
@section('description', 'Cablera.Online - Noticias de Chaco.')

@section('content')
<div class="row">
    <section class="col-sm-9 col-lg-10">
    @if ($posts->count() > 0)
    	@include('shared.posts', ['posts' => $posts, 'paginate' => false])
    @else
    	<p class="lead text-muted">No hay entradas públicadas.</p>
    @endif
    </section>
    <div class="col-sm-3 col-lg-2">
    @if (count($newspapers) > 0)
    @include('sidebar.newspapers', ['newspapers' => $newspapers])
    @endif
    </div>
</div><!-- .row -->
@endsection
