@extends('layouts.app')

@section('title', 'Acerca de ' . config('app.name'))
@section('description', 'Sistema informático que obtiene las noticias de los diarios digitales.')

@section('content')
<div class="row">
	<section class="col-sm-8">
		<article>
			<hgroup>
				<h3>Informarte de la mejor manera</h3>
				<h4 class="text-muted">Noticias de los diarios más importante para que no te pierdas nada.</h4>
			</hgroup>

			<p>Un sistema informático que obtiene las noticias de los diarios digitales, las clasifica y ordena por categoría, tema y lugar.</p>

			<p>No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>

			<p>No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
		</article>
	</section>
	<div class="col-sm-4">
		
	</div>
</div><!-- .row -->
@endsection
