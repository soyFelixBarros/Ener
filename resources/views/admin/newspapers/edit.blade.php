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
            </div>
        </div>
    </div><!-- .panel-heading -->
    <div class="panel-body">
        <div class="form-group">
            <label>Province</label>
            <select name="newspaper_id" class="form-control">
                <option value="{{ $newspaper->province_code }}" selected="selected">{{ $newspaper->province->name }}</option>
                @foreach ($provinces as $province)
                    @if ($newspaper->province_code != $province->code)
                    <option value="{{ $province->code }}">{{ $province->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        {{ csrf_field() }}
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