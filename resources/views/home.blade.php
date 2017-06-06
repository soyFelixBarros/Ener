@extends('layouts.app')

@section('title', config('app.name'))

@section('content')
<div class="row">
    <section class="col-sm-9">
    @if ($posts->count() > 0)
        @if ($parents->count() > 0)
            @include('shared.posts', ['posts' => $parents->posts(), 'paginate' => false])
        @endif
    	@include('shared.posts', ['posts' => $posts, 'paginate' => false])
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
