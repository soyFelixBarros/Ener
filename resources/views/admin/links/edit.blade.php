@extends('layouts.admin')
@section('title', $title)
@section('content.admin')
<form class="card" role="form" method="POST">
    <div class="card-header clearfix">
        <div class="float-left">
            <h5 class="mt-1 mb-1">{{ $title }}</h5>
        </div>
        <div class="float-right">
        </div>
    </div><!-- .card-header -->
    <div class="card-body">
        @csrf
        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            <label>Url</label>
            <input type="text" name="url" class="form-control" value="{{ $link->url }}">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="active" value="1" {{ $link->active ? ' checked' : '' }}> Activo
            </label>
        </div>
    </div><!-- .card-body -->
    <div class="card-footer clearfix">
        <div class="float-left">
            <a href="{{ route('admin_links_delete', ['id' => $link->id]) }}" class="btn btn-danger" role="button">Borrar</a>
        </div>
        <div class="float-right">
            <a href="{{ route('admin_links') }}" class="btn btn-outline-secondary" role="button">Regresar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </div><!-- .card-footer -->
</form><!-- .card -->
@endsection