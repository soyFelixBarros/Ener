@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <article class="media">
                        <h4 class="media-heading"><a href="#">{{ $post->title }}</a></h4>
                        <span class="text-muted">{{ $post->newspaper->name }} - {{ $post->created_at }}</span>
                    </article>
                @endforeach
                @endif
                </div>
            </div>
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection
