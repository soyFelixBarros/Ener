<footer class="mt-5">
	<div class="container">
		<ul class="nav justify-content-center">
			<li class="nav-link"><a href="{{ route('newspapers') }}">Diarios</a></li>
			<li class="nav-link"><a href="{{ route('about') }}">Información</a></li>
			<li class="nav-link"><a href="https://twitter.com/cableraonline" target="_blank">Twitter</a></li>
		</ul>
		<div class="col text-center">
			<small class="text-muted">&copy; {{ date('Y') }} {{ config('app.name') }}</small>
		</div>
	</div><!-- .container -->
</footer>