@extends('layouts.app')

@section('title', 'Diarios')

@section('content')
<header>
	<h1>Diarios</h1>
</header>
<hr>
<section class="row">
	@forelse($newspapers as $newspaper)
	<div class="col-md-4">
	<article class="panel panel-default">
		<div class="panel-heading text-center">
			<h3>{{ $newspaper->name }}</h3>
		</div>
		<ul class="list-group">
			<li class="list-group-item"><i class="fa fa-globe" aria-hidden="true"></i> {{ $newspaper->province->name }}, {{ $newspaper->country->name }}</li>
		    <li class="list-group-item"><i class="fa fa-link" aria-hidden="true"></i> <a href="{{ $newspaper->website }}" target="_blank">{{ $newspaper->website }}</a></li>
		    <li class="list-group-item text-right"><a href="{{ route('newspaper_show', ['newspaper' => $newspaper->slug]) }}" class="text-muted">Ver las publicaciones</a></li>
		 </ul>
	</article>
	</div>
	@empty
	<p>No hay diarios.</p>
	@endforelse
</section>
@endsection
