@extends('layouts.admin')
@section('title', 'Delete post')
@section('content.admin')
<div class="posts panel panel-default">
    <div class="panel-heading">¿Estás seguro de que quieres eliminar ésta entrada?</div>
    <article class="clearfix">
        @if ($post->image !== null)
        <div class="col-sm-4 col-md-3 image">
            <a href="{{ $post->url }}" target="_blank"><img src="/uploads/images/{{ $post->image }}" class="img-responsive" alt="{{ $post->title }}"></a>
        </div>
        <div class="col-sm-8 col-md-9">
        @else
        <div class="col-sm-12">
        @endif 
        <header>
            <hgroup>
                <h1 class="title"><a href="{{ $post->url }}" target="_blank">{{ $post->title }}</a></h1>
                <h6 class="newspaper-datetime">
                    <a href="{{ route('newspaper_show', ['newspaper' => $post->newspaper->slug]) }}">{{ $post->newspaper->name }}</a> - <time class="timeago" datetime="{{ $post->created_at }}">{{ $post->created_at }}</time>
                @if ($post->category_id !== null)
                 en <a href="{{ route('category_show', ['category' => $post->category->slug]) }}" class="category {{ $post->category->slug }}">{{ $post->category->name }}</a>
                @endif
                </h6>
            </hgroup>
        </header>
        @if ($post->summary)
        <p class="summary hidden-xs">{{ $post->summary }}</p>
        @endif
        @if($post->children()->count() > 0)
            <ul class="list-unstyled hidden-xs">
            @foreach ($post->children as $children)
                <li><a href="{{ $children->url }}" target="_blank">{{ $children->title }}</a> - <small class="text-muted">{{ $children->newspaper->name }}</small></li>
            @endforeach
            </ul>
        @endif
        </div>
    </article>
    <form class="panel-footer" role="form" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-4">
                <a href="{{ route('admin_posts_edit', ['id' => $post->id]) }}" type="submit" class="btn btn-primary">Edit</a>
            </div>
            <div class="col-xs-8 text-right">
                <a href="{{ route('admin_posts') }}" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </form>
</div><!-- .panel -->
@endsection