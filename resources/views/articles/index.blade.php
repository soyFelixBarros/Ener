@extends('layouts.base')
@section('title', 'Articles')
@section('content.base')
<div class="panel panel-default">
    <div class="panel-heading">Articles</div>
    <div class="panel-body">
        @if (count($articles) > 0)
        @foreach ($articles as $article)
        <article class="media-body">
            @if (count($article->tags) > 0)
            <h6 class="media-heading text-uppercase">
            @foreach ($article->tags as $tag)
            <a href="{{ route('tag_show', ['slug' => $tag->slug]) }}"><em>#{{ $tag->name }}</em></a>
            @endforeach
            </h6>
            @endif
            <h4 class="media-heading"><a href="{{ $article->link->url }}" target="_blank">{{ $article->title }}</a></h4>
            @if ($article->summary)
            <p>{{ $article->summary }}</p>
            @endif
            <div class="row">
                <div class="col-md-8 text-left">
                    <small class="text-muted">{{ $article->newspaper->name }} - <time class="timeago" datetime="{{ $article->created_at }}"></time></small>  
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{ route('article_edit', ['id' => $article->id]) }}" title="Edit article"><span class="glyphicon glyphicon-edit"></span></a>  
                </div>
            </div>
        </article>
        <hr>
        @endforeach
        <div class="text-center"> 
            {{ $articles->links() }}
        </div>
        @endif
    </div><!-- .panel-body -->
</div><!-- .panel -->
@endsection