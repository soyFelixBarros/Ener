@extends('layouts.app')

@section('title', 'Acerca de ' . config('app.name'))
@section('description', 'Sistema informático que obtiene las noticias de los diarios digitales.')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="row">
			<section class="col-sm-7">
				<article>
					<h3>Informarte de la mejor manera</h3>
					<p>Hola mi nombre es <a href="https://twitter.com/soyfelixbarros" target="_blank">Felix Barros</a>, desarrollador de programas informáticos. Actualmente recido en la ciudad de Resistencia, provincia del Chaco, Argentina. Cablera.Online es un proyecto personal en constante desarrollo.</p>

					<h4>¿Qué es Cablera.Online?</h4>
					<p>Cablera.Online es un programa informatico que utiliza la técnica de <a href="https://es.wikipedia.org/wiki/Web_scraping" target="_blank">Web scraping</a> para extraer las noticias de los diarios digitales más importantes.</p>

					<h4>¿Cuál es el objetivo?</h4>
					<p>Visualizar todas las noticias en un solo lugar, filtrarlas por temas y categorías, personas que están siendo protagonistas y lugar del hecho.</p>

					<h4>Contacto</h4>
					<p>Te invito a ponerte en contacto a través de mi correo personal <strong>soyFelixBarros@gmail.com</strong>.</p>
				</article>
			</section>
			<div class="col-sm-5">
				<aside class="jumbotron">
					<span class="lead">Noticias de los diarios más importante para que no te pierdas nada.</span>
				</aside>
			</div>
		</div>
	</div>
</div><!-- .row -->
@endsection
