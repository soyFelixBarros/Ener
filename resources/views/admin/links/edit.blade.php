@extends('layouts.admin')
@section('title', 'Edit link')
@section('content.admin')
<form class="panel panel-default" role="form" method="POST">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                <h3>Edit link</h3>
            </div>
            <div class="col-md-2 text-right">
            </div>
        </div>
    </div><!-- .panel-heading -->

    <div class="panel-body">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            <label>Url</label>
            <input type="text" name="url" class="form-control" value="{{ $link->url }}">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="active" value="1" {{ $link->active ? ' checked' : '' }}> Activo
            </label>
        </div>
    </div><!-- .panel-body -->

    <div class="panel-footer">
        <div class="row">
            <div class="col-xs-4">
            </div>
            <div class="col-xs-8 text-right">
                <a href="{{ route('admin_links') }}" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
    </div><!-- .panel-footer -->
</div><!-- .panel -->
@endsection