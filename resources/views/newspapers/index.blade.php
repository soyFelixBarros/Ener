@extends('layouts.app')

@section('title', 'Diarios')

@section('content')
<section class="row">
	@forelse($newspapers as $newspaper)
	<div class="col-md-4">
	<article class="panel panel-default">
		<div class="panel-heading text-center">
			<h3>{{ $newspaper->name }}</h3>
		</div>
		<div class="panel-body">
			<ul class="list-unstyled">
				<li>{{ $newspaper->province->name }}, {{ $newspaper->country->name }}</li>
				<li><a href="{{ $newspaper->website }}" target="_blank">{{ $newspaper->website }}</a></li>
			</ul>
		</div>
	</article>
	</div>
	@empty
	<p>No hay diarios.</p>
	@endforelse
</section>
@endsection
