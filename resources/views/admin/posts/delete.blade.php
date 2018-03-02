@extends('layouts.admin')

@section('title', 'Eliminar noticia')

@section('content.admin')
<div class="posts card">
    <div class="card-header">¿Estás seguro de que quieres eliminar ésta entrada?</div>
    <div class="card-body">
        @include('shared.posts', ['posts' => array('posts' => $post), 'type' => 'large' ])
    </div>
    <form class="card-footer" role="form" method="POST">
        {{ csrf_field() }}
        <div class="float-right">
            <a href="{{ route('admin_posts') }}" class="btn btn-outline-secondary" role="button">Cancelar</a>
            <button type="submit" class="btn btn-danger">Borrar</button>
        </div>
    </form>
</div><!-- .panel -->
@endsection