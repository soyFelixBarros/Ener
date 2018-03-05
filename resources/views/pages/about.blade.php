@extends('layouts.app')

@section('title', 'Información')
@section('description', 'Sistema informático que obtiene las noticias de los diarios digitales.')

@section('content')

<div class="container">
	<div class="row justify-content-md-center">
		<section class="card col-sm-7">
			<article class="card-body">
				<h2>Información</h2>
				<p>Hola mi nombre es Felix Barros, desarrollador de programas informáticos. Actualmente recido en la ciudad de Resistencia, provincia del Chaco, Argentina. Cablera.Online es un proyecto personal en constante desarrollo.</p>

				<h4>¿Qué es?</h4>
				<p>Cablera.Online es un programa informatico que utiliza la técnica de <a href="https://es.wikipedia.org/wiki/Web_scraping" target="_blank">Web scraping</a> para extraer las noticias de los diarios digitales más importantes.</p>

				<h4>¿Cuál es el objetivo?</h4>
				<p>Visualizar todas las noticias en un solo lugar, filtrarlas por temas y categorías, personas que están siendo protagonistas y lugar del hecho.</p>

				<h4>Contacto</h4>
				<p>Te invito a ponerte en contacto a través de tiwtter <a href="https://twitter.com/soyfelixbarros" target="_blank">@soyFelixBarros</a>.</p>
			</article>
		</section>
	</div><!-- .row -->
</div>
@endsection
