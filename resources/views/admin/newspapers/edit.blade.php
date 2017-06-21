@extends('layouts.admin')
@section('title', 'Edit newspaper')
@section('content.admin')
<form class="panel panel-default" role="form" method="POST">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                <h3>Edit newspaper</h3>
            </div>
            <div class="col-md-2 text-right">
                <a href="{{ route('admin_newspapers_create') }}" class="btn btn-success" role="button"><span class="glyphicon glyphicon-plus"></span> Create</a>
            </div>
        </div>
    </div><!-- .panel-heading -->
    <div class="panel-body">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Province</label>
            @include('shared.select-location', ['provinces' => $provinces, 'selected' => $newspaper->province_id])
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $newspaper->name }}">
        </div>
        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
            <label>Website</label>
            <input type="text" name="website" class="form-control" value="{{ $newspaper->website }}">
        </div>
    </div><!-- .panel-body -->
    <div class="panel-footer">
        <div class="row">
            <div class="col-xs-4">
            </div>
            <div class="col-xs-8 text-right">
                <a href="{{ route('admin_newspapers') }}" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
    </div><!-- .panel-footer -->
</div><!-- .panel -->
@endsection