@extends('layouts.admin')

@section('title', 'Delete link')

@section('content.admin')
<div class="card">
    <div class="card-header">
        ¿Estás seguro de que quieres eliminar éste enlace?
    </div><!-- .card-header -->
    <div class="card-body">
        <a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a>
    </div><!-- .card-body -->
    <form class="card-footer" role="form" method="POST">
        @csrf
        <div class="float-left">
        </div>
        <div class="float-right">
            <a href="{{ route('admin_links') }}" class="btn btn-outline-secondary" role="button">Cancelar</a>
            <button type="submit" class="btn btn-danger">Borrar</button>
        </div>
    </form><!-- .card-footer -->
</div><!-- .card -->
@endsection