<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="list-inline">
					<li><a href="{{ route('about') }}">Información</a></li>
					<li><a href="{{ route('newspapers') }}">Diarios</a></li>
				</ul>
			</div>
		</div>
		<div class="row copy">
			<div class="col-xs-12">
				<span>&copy; {{ date('Y') }} {{ config('app.name') }}</span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<ul class="social list-inline">
					<li><a href="https://twitter.com/cableraonline" target="_blank"><i class="fa fa-twitter"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>