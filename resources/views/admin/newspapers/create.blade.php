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
    </div><!-- .panel-heading -->
    <div class="card-body">
        <div class="form-group{{ $errors->has('province_id') ? ' has-error' : '' }}">
            <label>Provincias</label>
            @include('shared.select-location', ['provinces' => $provinces, 'selected' => old('province_id')])
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
            <label>Website</label>
            <input type="text" name="website" class="form-control" value="{{ old('website') }}">
        </div>
        <div class="form-group{{ $errors->has('host') ? ' has-error' : '' }}">
                <label>Dominio</label>
                <input type="text" name="website" class="form-control" placeholder="example.com" value="{{ old('host') }}">
        </div>
    </div><!-- .card-body -->
    <div class="card-footer clearfix">
        <div class="float-left">
        </div>
        <div class="float-right">
            <a href="{{ route('admin_newspapers') }}" class="btn btn-outline-secondary" role="button">Regresar</a>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </div><!-- .card-footer -->
</form><!-- .card -->
@endsection