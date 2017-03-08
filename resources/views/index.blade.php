@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="posts col-md-8">
            @if (count($articles) > 0)
            @foreach ($articles as $article)
            <div class="panel panel-default">
                <div class="panel-body">
                    <article class="media">
                        <header>
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
            @endif
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection
