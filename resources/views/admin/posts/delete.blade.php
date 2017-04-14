@extends('layouts.admin')
@section('title', 'Delete post')
@section('content.admin')
<div class="panel panel-default">
    <div class="panel-heading">¿Estás seguro de que quieres eliminar ésta entrada?</div>
    <div class="panel-body">
        <div class="media">
            @if ($post->image !== null)
            <div class="media-left">
                <img class="media-object" src="/uploads/images/{{ $post->image }}" width="200" height="150">
            </div>
            @endif
            <div class="media-body">
                <h4 class="media-heading">{{ $post->title }}</h4>
                @if ($post->summary)
                <p>{{ $post->summary }}</p>
                @endif
            </div>
        </div><!-- media -->
    </div><!-- panel-body -->
    <form class="panel-footer text-right" role="form" method="POST">
        {{ csrf_field() }}
        <a href="{{ route('admin_posts') }}" type="submit" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
</div><!-- .panel -->
@endsection