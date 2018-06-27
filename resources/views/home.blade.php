@extends('layouts.app')

@section('title', config('app.name'))
@section('description', 'Informarte de la mejor manera. Todas las noticias de los diarios más importante de la provincia de Chaco, Argentina.')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-2 mb-4">
            @include('shared.sidebar-left', ['categories' => $categories])
        </div>
        <div class="col-sm-12 col-md-8">
            <h6 class="text-muted mb-4">Últimas noticias de Chaco</h6>
            <div class="card">
                <div class="card-body">
                @include('shared.posts', ['posts' => $posts, 'type' => 'large'])
                </div>
            </div><!-- .card -->
        </div>
        <div class="col-sm-12 col-md-2">
            @include('shared.sidebar-right')
        </div>
    </div>
</div>
@endsection
