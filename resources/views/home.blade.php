@extends('layouts.app')

@section('title', config('app.name'))
@section('description', 'Informarte de la mejor manera. Todas las noticias de los diarios más importante de la provincia de Chaco, Argentina.')

@section('content')
<div class="container">
    @include('shared.posts', ['posts' => $posts])
</div>
@endsection
