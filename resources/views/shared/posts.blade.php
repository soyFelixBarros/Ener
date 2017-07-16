@if(count($posts) > 0)
<section class="row posts masonry-container">
    @foreach ($posts as $post)
    @if (is_null($post->parent_id))
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-6 clearfix item">
        <div class="row">
            @if ($post->image != null)
            <div class="col-xs-4 col-sm-5 col-md-3 col-lg-4 image">
                <a href="{{ $post->url }}" target="_blank" rel="bookmark"><img src="/images/{{ $post->image }}?w=170&h=150&q=80&fit=crop-top&sharp=10" width="170" height="150" class="img-responsive" alt="{{ $post->title }}"></a>
            </div>
            <div class="col-xs-8 col-sm-7 col-md-9 col-lg-8">
            @else
            <div class="col-sm-12">
            @endif 
            <header>
                <hgroup>
                    <h1 class="title"><a href="{{ $post->url }}" target="_blank" rel="bookmark">{{ $post->title }}</a></h1>
                    <h6 class="newspaper-datetime">
                        @if (Auth::check())
                            @if (Auth::user()->hasRole('admin'))
                            <a href="{{ route('admin_posts_edit', ['id' => $post->id]) }}" title="Edit post">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a> /
                            @endif
                        @endif
                        <a href="{{ route('newspaper_show', ['newspaper' => $post->newspaper->slug]) }}">{{ $post->newspaper->name }}</a> - <time class="timeago" datetime="{{ $post->created_at }}" title="{{ $post->created_at }}"></time>
                    </h6>
                </hgroup>
            </header>
            @if ($post->summary)
            <p class="summary">{{ str_limit($post->summary, 130) }}</p>
            @endif
            </div>
        </div>
    </article>
    @endif
    @endforeach
</section>
@if (! isset($paginate))
<div class="text-center">
    {{ $posts->links() }}
</div>
@endif
@else
<p class="text-muted">No hay entradas públicadas.</p>
@endif