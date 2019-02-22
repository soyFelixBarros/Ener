@extends('layouts.base')

@section('title', 'Editar fuente')

@section('content.base')
<form class="card" role="form" method="POST">
    <div class="card-header clearfix">
        <div class="float-left">
            <h5 class="mt-1 mb-1">Editar fuente</h5>
        </div>
        <div class="float-right">
        </div>
    </div><!-- .card-header -->
    <div class="card-body">
        @csrf
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $source->name }}">
        </div>
        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            <label>URL</label>
            <input type="text" name="url" class="form-control" value="{{ $source->url }}">
        </div>
        <div class="form-group{{ $errors->has('tax_id') ? ' has-error' : '' }}">
            <label>Taxonomy ID</label>
            <input type="number" name="tax_id" class="form-control" value="{{ $source->tax_id }}">
        </div>
    </div><!-- .card-body -->
    <div class="card-footer clearfix">
        <div class="float-left">
        </div>
        <div class="float-right">
            <a href="{{ route('admin.sources.index') }}" class="btn btn-outline-secondary" role="button">Regresar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </div><!-- .card-footer -->
</form><!-- .card -->
@endsection