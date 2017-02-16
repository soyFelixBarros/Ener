@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <section class="panel panel-default">
                <div class="panel-heading">Últimas noticias</div>

                <div class="panel-body">
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                    <article class="media">
                      <div class="media-body">
                        <h6 class="text-muted"><a href="#">{{ $post->newspaper->name }}</a> hace 6 minutos</h6>
                        <h4 class="media-heading"><a href="#">{{ $post->title }}</a></h4>
                        <p>{{ $post->summary }}</p>
                      </div>
                    </article>
                    @endforeach
                @endif
                </div>
            </section>
        </div>
        <div class="col-md-4">
            @if (count($newspapers) > 0)
            <aside>
                <div class="list-group">
                    @foreach ($newspapers as $newspaper)
                    <a href="#" class="list-group-item">
                        <span class="badge">{{ count($newspaper->posts) }}</span> 
                        {{ $newspaper->name }}
                    </a>
                    @endforeach            
                </div>
            </aside>
            @endif
        </div>
    </div><!-- .row -->
</div>
@endsection
