@extends('layouts.admin')
@section('title', 'Create newspaper')
@section('content.admin')
<form class="panel panel-default" role="form" method="POST">
    {{ csrf_field() }}
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                <h3>Create newspaper</h3>
            </div>
            <div class="col-md-2 text-right">
            </div>
        </div>
    </div><!-- .panel-heading -->
    <div class="panel-body">
        <div class="form-group{{ $errors->has('province_code') ? ' has-error' : '' }}">
            <label>Province</label>
            <select name="province_code" class="form-control">
                <option selected="selected">None</option>
                @foreach ($provinces as $province)
                    @if (old('province_code') != $province->code)
                    <option value="{{ $province->code }}">{{ $province->name }}</option>
                    @else
                    <option value="{{ old('province_code') }}" selected="selected">{{ $province->name }}</option>

                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
            <label>Website</label>
            <input type="text" name="website" class="form-control" value="{{ old('website') }}">
        </div>
    </div><!-- .panel-body -->
    <div class="panel-footer">
        <div class="row">
            <div class="col-xs-4">
            </div>
            <div class="col-xs-8 text-right">
                <a href="{{ route('admin_newspapers') }}" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
    </div><!-- .panel-footer -->
</form><!-- .panel -->
@endsection