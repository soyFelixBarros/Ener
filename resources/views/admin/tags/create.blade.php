@extends('layouts.admin')
@section('title', 'Create tag')
@section('content.admin')
<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Create tag</div>
    <div class="panel-body">
        <form role="form" method="POST">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-default">Save</button>
        </form>
    </div><!-- .panel-body -->
</div><!-- .panel -->
@endsection