@extends('layouts.settings')
@section('title', 'Profile')
@section('content.settings')
<div class="panel panel-default">
    <div class="panel-heading">Contact Information</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
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