@extends('layouts.base')
@section('title', 'Posts')
@section('content.base')
<div class="panel panel-default">
    <div class="panel-heading">Posts</div>
    <div class="panel-body">
        @if (count($posts) > 0)
        @foreach ($posts as $post)
        <article class="media-body">
            @if (count($post->tags) > 0)
            <h6 class="media-heading text-uppercase">
            @foreach ($post->tags as $tag)
            <a href="{{ route('tag_show', ['slug' => $tag->slug]) }}"><em>#{{ $tag->name }}</em></a>
            @endforeach
            </h6>
            @endif
            <h4 class="media-heading"><a href="{{ $post->link->url }}" target="_blank">{{ $post->title }}</a></h4>
            @if ($post->summary)
            <p>{{ $post->summary }}</p>
            @endif
            <div class="row">
                <div class="col-md-8 text-left">
                    <small class="text-muted">{{ $post->newspaper->name }} - <time class="timeago" datetime="{{ $post->created_at }}"></time></small>  
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{ route('post_edit', ['id' => $post->id]) }}" title="Edit post"><span class="glyphicon glyphicon-edit"></span></a>  
                </div>
            </div>
        </article>
        <hr>
        @endforeach
        <div class="text-center"> 
            {{ $posts->links() }}
        </div>
        @endif
    </div><!-- .panel-body -->
</div><!-- .panel -->
@endsection