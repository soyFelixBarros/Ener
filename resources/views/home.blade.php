@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if (count($newspapers) > 0)
            <div class="panel panel-default panel-flush">
                <div class="panel-heading">Diarios</div>
                <ul class="nav settings-stacked-tabs">
                    <li{{ Request::is('/') ? ' class=active' : '' }}><a href="{{ route('home') }}">Todos</a></li>
                    @foreach ($newspapers as $newspaper)
                    <li{{ Request::is('newspaper/*') ? ' class=active' : '' }}><a href="{{ route('newspaper_show', ['newspaper' => $newspaper->id]) }}">{{ $newspaper->name }}</a></li>
                    @endforeach
                </ul>
            </div><!-- .panel -->
            @endif
        </div>
        <div class="posts col-md-9">
            @if (count($articles) > 0)
            @foreach ($articles as $article)
            <div class="panel panel-default">
                <div class="panel-body">
                    <article class="media">
                        <header>
                            @if (count($article->tags) > 0)
                            <ul class="tags list-inline">
                            @foreach ($article->tags as $tag)
                            <li><a href="{{ route('tag_show', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                            @endforeach
                            </ul>
                            @endif
                            <h1 class="title media-heading"><a href="{{ $article->link->url }}" target="_blank">{{ $article->title }}</a></h1>
                        </header>
                        @if ($article->summary)
                        <p class="summary">{{ $article->summary }}</p>
                        @endif
                        <footer>
                            <span>{{ $article->newspaper->name }}</span> -
                            <time class="timeago" datetime="{{ $article->created_at }}"></time>
                        </footer>
                    </article>
                </div>
            </div>
            @endforeach
            <div class="text-center">
                {{ $articles->links() }}
            </div>
            @endif
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection
