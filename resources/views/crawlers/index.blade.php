@extends('layouts.app')

@section('title', 'Crawler')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3><a href="{{ $post->url }}">{{ $post->title }}</a></h3>
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection
