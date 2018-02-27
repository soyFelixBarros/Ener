@extends('layouts.base')
@section('title', 'Profile')
@section('content.base')
<div class="card">
    <div class="card-header">Información del contacto</div>
    <div class="card-body">
        <form class="form-horizontal" role="form" method="POST">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Nombre</label>
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Correo electrónico</label>
                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-4 col-md-6">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form>
    </div><!-- .panel-body -->
</div><!-- .panel -->
@endsection