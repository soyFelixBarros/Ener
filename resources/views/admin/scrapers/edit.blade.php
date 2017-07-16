@extends('layouts.admin')
@section('title', 'Edit scraper')
@section('content.admin')
<form class="panel panel-default" role="form" method="POST">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                <h3>Edit scraper <small>{{ $scraper->newspaper->name }}</small></h3>
            </div>
            <div class="col-md-2 text-right">
            </div>
        </div>
    </div><!-- .panel-heading -->
    <div class="panel-body">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $scraper->title }}">
        </div>
        <div class="form-group{{ $errors->has('src') ? ' has-error' : '' }}">
            <label>Image (src)</label>
            <input type="text" name="src" class="form-control" value="{{ $scraper->src }}">
        </div>
        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label>Content</label>
            <input type="text" name="content" class="form-control" value="{{ $scraper->content }}">
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