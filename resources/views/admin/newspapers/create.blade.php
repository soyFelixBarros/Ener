@extends('layouts.admin')

@section('title', 'Create newspaper')

@section('content.admin')
<form class="card" role="form" method="POST">
    {{ csrf_field() }}
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3>Create newspaper</h3>
            </div>
            <div class="col-md-2 text-right">
            </div>
        </div>
    </div><!-- .panel-heading -->
    <div class="card-body">
        <div class="form-group{{ $errors->has('province_id') ? ' has-error' : '' }}">
            <label>Province</label>
            @include('shared.select-location', ['provinces' => $provinces, 'selected' => old('province_id')])
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
    <div class="card-footer">
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