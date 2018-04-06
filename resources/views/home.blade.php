@extends('layouts.app')

@section('title', config('app.name'))
@section('description', 'Informarte de la mejor manera. Todas las noticias de los diarios más importante de la provincia de Chaco, Argentina.')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-2 mb-3">
            @include('shared.sidebar-left', ['categories' => $categories])
        </div>
        <div class="col-sm-12 col-md-6">
            @include('shared.posts', ['posts' => $posts, 'type' => 'card'])
        </div>
        <div class="col-sm-12 col-md-4">
            @include('shared.sidebar-right')
        </div>
    </div>
</div>
@endsection
