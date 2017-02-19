@extends('layouts.settings')
@section('title', 'Security')
@section('content.settings')
<div class="panel panel-default">
	<div class="panel-heading">Update Password</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form" method="POST">
			{{ csrf_field() }}
			<div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
				<label class="col-md-4 control-label">Current Password</label>
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
				<label class="col-md-4 control-label">Password</label>
				<div class="col-md-6">
					<input type="password" name="password" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Confirm Password</label>
				<div class="col-md-6">
					<input type="password" name="password_confirmation" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-4 col-md-6">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
	</div><!-- .panel-body -->
</div><!-- .panel -->
@endsection