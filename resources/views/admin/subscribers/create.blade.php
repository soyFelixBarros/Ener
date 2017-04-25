@extends('layouts.admin')
@section('title', 'Create subscriber')
@section('content.admin')
<form class="panel panel-default" role="form" method="POST">
    {{ csrf_field() }}
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                <h3>Create subscriber</h3>
            </div>
            <div class="col-md-2 text-right">
            </div>
        </div>
    </div><!-- .panel-heading -->
    <div class="panel-body">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
    </div><!-- .panel-body -->
    <div class="panel-footer">
        <div class="row">
            <div class="col-xs-4">
            </div>
            <div class="col-xs-8 text-right">
                <a href="{{ route('admin_subscribers') }}" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
    </div><!-- .panel-footer -->
</form><!-- .panel -->
@endsection