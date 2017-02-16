@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>

                <div class="panel-body">
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                    <article>
                        <h3><a href="#">{{ $post->title }}</a></h3>
                    </article>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
