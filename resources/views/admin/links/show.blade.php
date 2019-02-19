@extends('layouts.base')

@section('title', $link->url)

@section('content.base')
<div class="card">
	<div class="card-header clearfix">
		<div class="float-left">
			<h5 class="mt-1 mb-1">{{ $link->url }}</h5>
		</div>
		<div class="float-right">
			{{-- <a href="#" class="btn btn-light btn-sm" role="button">Filtros</a>	 --}}
		</div>
	</div>
	<div class="card-body">
	</div>
</div>
@endsection