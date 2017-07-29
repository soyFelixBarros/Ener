@extends('layouts.app')

@section('title', 'Diarios')

@section('content')

@component('partials.sub-header')
	@slot('title')
	Diarios
	@endslot
	<li class="active">Diarios</li>
@endcomponent

<div class="container">
	<section class="row">
		@forelse($newspapers as $newspaper)
		<div class="col-md-4">
		<article class="panel panel-default">
			<div class="panel-body">
				<h4>{{ $newspaper->name }}</h4>
				<ul class="list-unstyled">
					<li class="text-muted">{{ $newspaper->province->name }}, {{ $newspaper->country->name }}</li>
					<li><a href="{{ $newspaper->website }}" target="_blank">{{ $newspaper->website }}</a></li>
				</ul>
			</div>
		</article>
		</div>
		@empty
		<p>No hay diarios.</p>
		@endforelse
	</section>
</div>
@endsection
