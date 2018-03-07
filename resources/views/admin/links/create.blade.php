@extends('layouts.admin')

@section('title', $title)

@section('content.admin')
<form class="card" role="form" method="POST">
    @csrf
    <div class="card-header clearfix">
        <div class="float-left">
            <h5 class="mt-1 mb-1">{{ $title }}</h5>
        </div>
        <div class="float-right">
        </div>
    </div><!-- .card-header -->
    <div class="card-body">
        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            <label>Url</label>
            <input type="url" name="url" class="form-control" value="{{ old('url') }}">
        </div>
    </div><!-- .card-body -->
    <div class="card-footer clearfix">
        <div class="float-left">
        </div>
        <div class="float-right">
            <a href="{{ route('admin_links') }}" class="btn btn-outline-secondary" role="button">Regresar</a>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </div><!-- .card-footer -->
</form><!-- .card -->
@endsection