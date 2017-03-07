@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="posts col-md-8">
            @if (count($articles) > 0)
            @foreach ($articles as $article)
            <div class="panel panel-default">
                <div class="panel-body">
                    <article class="media post">
                        <h2 class="title media-heading"><a href="{{ $article->link->url }}" target="_blank">{{ $article->title }}</a></h2>
                        @if ($article->summary)
                        <p class="summary">{{ $article->summary }}</p>
                        @endif
                        <span class="newspaper">{{ $article->newspaper->name }}</span>
                    </article>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection
