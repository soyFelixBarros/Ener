@extends('layouts.base')
@section('title', 'Edit post')
@section('content.base')
<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-edit"></span> Edit article</div>
    <div class="panel-body">
        <form role="form" method="POST">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $article->title }}">
            </div>

            <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
                <label>Summary</label>
                <textarea name="summary" rows="3" class="form-control">{{ $article->summary }}</textarea>
            </div>
            
            <div class="form-group">
                <label>Tags</label>
                <select name="tags" class="form-control" multiple="multiple">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ (in_array($tag->name, $articleTags)) ? 'selected': '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Newspaper</label>
                <select name="newspaper_id" class="form-control">
                    <option value="{{ $article->newspaper->id }}" selected="selected">{{ $article->newspaper->name }}</option>
                    @foreach ($newspapers as $newspaper)
                        @if ($article->newspaper->id != $newspaper->id)
                        <option value="{{ $newspaper->id}}">{{ $newspaper->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div><!-- .panel-body -->
</div><!-- .panel -->
@endsection