@extends('layouts.admin')

@section('title', 'Create link')

@section('content.admin')
<form class="panel panel-default" role="form" method="POST">
    {{ csrf_field() }}
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                <h3>Create link</h3>
            </div>
            <div class="col-md-2 text-right">
            </div>
        </div>
    </div><!-- .panel-heading -->
    <div class="panel-body">
        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            <label>Url</label>
            <input type="url" name="url" class="form-control" value="{{ old('url') }}">
        </div>
    </div><!-- .panel-body -->
    <div class="panel-footer">
        <div class="row">
            <div class="col-xs-4">
            </div>
            <div class="col-xs-8 text-right">
                <a href="{{ route('admin_links') }}" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
    </div><!-- .panel-footer -->
</form><!-- .panel -->
@endsection