@extends('layouts.app')

@section('title', 'Newsletters')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
    	<h2>Nunca te pierdas una historia</h2>
    	<p>Selecciona las newsletters que más te interesan y haz clic en "Continuar". Para recibirlas, solamente tendrás que introducir tu correo electrónico.</p>
    </div>
</div><!-- .row -->

<hr>

<div class="row">
	<div class="col-md-3">
		<img src="https://email.nypost.com/images/morning-report@1x.jpg" class="img-responsive">
		<h4>Actualidad diaria</h4>
		<p>Las noticias que deberías conocer a primera hora y los temas que marcan la jornada</p>
	</div>
</div>
@endsection
