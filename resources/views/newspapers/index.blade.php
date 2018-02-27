@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="container">
	<h3 class="mb-4">
		{{ $title }}<br />
		<small class="text-muted">{{ $newspapers->count() }} registrados</small>
	</h3>
	<section class="row">
		@forelse($newspapers as $newspaper)
		<div class="col-md-4">
		<article class="card mb-4">
			<div class="card-body">
				<h5 class="card-title"><a href="{{ route('newspaper_show', ['newspaper' => $newspaper->slug]) }}">{{ $newspaper->name }}</a></h5>
				<h6 class="card-subtitle mb-2 text-muted">{{ $newspaper->posts->count() }} noticias</h6>
				<a href="{{ $newspaper->website }}" class="text-dark" target="_blank">{{ $newspaper->website }}</a>
				<p class="card-text font-weight-light"><small class="text-muted">Actualizado <time class="timeago text-lowercase" datetime="{{ $newspaper->posts->last()['updated_at'] }}" title="{{ $newspaper->posts->first()['updated_at'] }}"></time></small></p>
			</div>
		</article>
		</div>
		@empty
		<p>No hay diarios registrados.</p>
		@endforelse
	</section>
</div>
@endsection
