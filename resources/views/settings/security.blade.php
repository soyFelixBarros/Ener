@extends('layouts.settings')
@section('title', 'Security')
@section('content.settings')
<div class="panel panel-default">
	<div class="panel-heading">Update Password</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-md-4 control-label">Current Password</label>
				<div class="col-md-6">
					<input type="password" name="current_password" class="form-control">
				</div>
			</div>
			<div class="form-group">
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