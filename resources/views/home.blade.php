@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="posts col-md-8">
            @if (count($posts) > 0)
            @foreach ($posts as $post)
            <div class="panel panel-default">
                <div class="panel-body">
                    <article class="media post">
                        <h2 class="title media-heading"><a href="{{ $post->link->url }}" target="_blank">{{ $post->title }}</a></h2>
                        @if ($post->summary)
                        <p class="summary">{{ $post->summary }}</p>
                        @endif
                        <span class="newspaper">{{ $post->newspaper->name }}</span>
                    </article>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection
