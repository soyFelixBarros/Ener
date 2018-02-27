@extends('layouts.base')
@section('title', 'Security')
@section('content.base')
<div class="card">
	<div class="card-header">Actualiza contraseña</div>
	<div class="card-body">
		<form class="form-horizontal" role="form" method="POST">
			{{ csrf_field() }}
			<div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
				<label class="col-md-4 control-label">Contraseña actual</label>
				<div class="col-md-6">
					<input type="password" name="current_password" class="form-control">
					@if ($errors->has('current_password'))
                    <span class="help-block">
                    	<strong>{{ $errors->first('current_password') }}</strong>
                    </span>
                    @endif
				</div>
			</div>
			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<label class="col-md-4 control-label">Contraseña</label>
				<div class="col-md-6">
					<input type="password" name="password" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Confirmar contraseña</label>
				<div class="col-md-6">
					<input type="password" name="password_confirmation" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-4 col-md-6">
					<button type="submit" class="btn btn-primary">Cambiar</button>
				</div>
			</div>
		</form>
	</div><!-- .panel-body -->
</div><!-- .panel -->
@endsection