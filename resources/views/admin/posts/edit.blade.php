@extends('layouts.admin')
@section('title', 'Edit post')
@section('content.admin')
<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-edit"></span> Edit post</div>
    <form class="panel-body" role="form" method="POST">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        </div>

        <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
            <label>Summary</label>
            <textarea name="summary" rows="3" class="form-control">{{ $post->summary }}</textarea>
        </div>
        
        <div class="form-group">
            <label>Tags</label>
            <select name="tags" class="form-control" multiple="multiple">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ (in_array($tag->name, $postTags)) ? 'selected': '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Newspaper</label>
            <select name="newspaper_id" class="form-control">
                <option value="{{ $post->newspaper->id }}" selected="selected">{{ $post->newspaper->name }}</option>
                @foreach ($newspapers as $newspaper)
                    @if ($post->newspaper->id != $newspaper->id)
                    <option value="{{ $newspaper->id}}">{{ $newspaper->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </form>
    <div class="panel-footer text-right">
        <a href="{{ route('admin_posts') }}" type="submit" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</div><!-- .panel -->
@endsection