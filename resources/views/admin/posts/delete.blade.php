@extends('layouts.admin')
@section('title', 'Delete post')
@section('content.admin')
<div class="posts panel panel-default">
    <div class="panel-heading">¿Estás seguro de que quieres eliminar ésta entrada?</div>
    <div class="panel-body">
        <section class="row posts">
        @if ($post->parent_id == null)
        <article class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix">
            @if ($post->image != null)
            <div class="col-xs-4 col-sm-5 col-md-3 col-lg-2 image">
                <a href="{{ $post->url }}" target="_blank" rel="bookmark"><img src="/uploads/images/{{ $post->image }}" width="170" height="170" class="img-responsive" alt="{{ $post->title }}"></a>
            </div>
            <div class="col-xs-8 col-sm-7 col-md-9 col-lg-10">
            @else
            <div class="col-sm-12">
            @endif 
            <header>
                <hgroup>
                    <h1 class="title"><a href="{{ $post->url }}" target="_blank" rel="bookmark">{{ $post->title }}</a></h1>
                    <h6 class="newspaper-datetime">
                        <a href="{{ route('newspaper_show', ['newspaper' => $post->newspaper->slug]) }}">{{ $post->newspaper->name }}</a> - <time class="timeago" datetime="{{ $post->created_at }}" title="{{ $post->created_at }}"></time>
                        @if ($post->category_id !== null)
                        - <a href="{{ route('category_show', ['category' => $post->category->slug]) }}" class="category {{ $post->category->slug }}">{{ $post->category->name }}</a>
                        @endif
                    </h6>
                </hgroup>
            </header>
            @if ($post->summary)
            <p class="summary">{{ $post->summary }}</p>
            @endif
            </div>
        </article>
        @endif
        </section>
    </div>
    <form class="panel-footer" role="form" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-4">
                <a href="{{ route('admin_posts_edit', ['id' => $post->id]) }}" type="submit" class="btn btn-primary">Edit</a>
            </div>
            <div class="col-xs-8 text-right">
                <a href="{{ route('admin_posts') }}" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </form>
</div><!-- .panel -->
@endsection