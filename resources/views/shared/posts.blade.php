<div class="row posts masonry-container">
    @foreach ($posts as $post)
    @if ($post->parent_id == null)
    <article class="row col-xs-12 col-sm-12 col-md-12 col-lg-6 clearfix item">
        @if ($post->image != null)
        <div class="col-xs-4 col-sm-5 col-md-3 col-lg-4 image">
            <a href="{{ $post->url }}" target="_blank" rel="bookmark"><img src="/uploads/images/{{ $post->image }}" class="img-responsive" alt="{{ $post->title }}"></a>
        </div>
        <div class="col-xs-8 col-sm-7 col-md-9 col-lg-8">
        @else
        <div class="col-sm-12">
        @endif 
        <header>
            <hgroup>
                <h1 class="title"><a href="{{ $post->url }}" target="_blank" rel="bookmark">{{ $post->title }}</a></h1>
                <h6 class="newspaper-datetime">
                    <a href="{{ route('newspaper_show', ['newspaper' => $post->newspaper->slug]) }}">{{ $post->newspaper->name }}</a> - <time class="timeago" datetime="{{ $post->created_at }}" title="{{ $post->created_at }}"></time>
                </h6>
            </hgroup>
        </header>
        @if ($post->summary)
        <p class="summary">{{ str_limit($post->summary, 150) }}</p>
        @endif
        </div>
        @if (Auth::check() && Request::is('admin/*'))
        <div class="action text-right col-xs-12">
            @if (Auth::user()->hasRole('admin'))
            <ul class="list-inline">
                <li><a href="{{ route('admin_posts_favorite', ['id' => $post->id]) }}" class="text-warning">
                    <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                </a></li>
                <li><a href="{{ route('admin_posts_edit', ['id' => $post->id]) }}">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a></li>
                <li><a href="{{ route('admin_posts_delete', ['id' => $post->id]) }}" class="text-danger">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a></li>
            </ul>
            @endif
        </div>
        @endif
    </article>
    @endif
    @endforeach
</div>
@if (! isset($paginate))
<div class="text-center">
    {{ $posts->links() }}
</div>
@endif