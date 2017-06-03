<div class="posts">
    @foreach ($posts as $post)
    @if($post->parent_id === null)
    <article class="clearfix">
        @if ($post->image !== null)
        <div class="col-sm-4 col-md-3 image">
            <a href="{{ $post->url }}" target="_blank" rel="bookmark"><img src="/uploads/images/{{ $post->image }}" class="img-responsive" alt="{{ $post->title }}"></a>
        </div>
        <div class="col-sm-8 col-md-9">
        @else
        <div class="col-sm-12">
        @endif 
        <header>
            <hgroup>
                <h1 class="title"><a href="{{ $post->url }}" target="_blank" rel="bookmark">{{ $post->title }}</a></h1>
                <h6 class="newspaper-datetime">
                    <a href="{{ route('newspaper_show', ['newspaper' => $post->newspaper->slug]) }}">{{ $post->newspaper->name }}</a> - <time class="timeago" datetime="{{ $post->created_at }}">{{ $post->created_at }}</time>
                @if ($post->category_id !== null)
                 en <a href="{{ route('category_show', ['category' => $post->category->slug]) }}" class="category {{ $post->category->slug }}">{{ $post->category->name }}</a>
                @endif
                </h6>
            </hgroup>
        </header>
        @if ($post->summary)
        <p class="summary">{{ $post->summary }}</p>
        @endif
        @if($post->children()->count() > 0)
            <ul class="list-unstyled hidden-xs">
            @foreach ($post->children as $children)
                <li><a href="{{ $children->url }}" target="_blank">{{ $children->title }}</a> - <small class="text-muted">{{ $children->newspaper->name }}</small></li>
            @endforeach
            </ul>
        @endif
        <footer class="row">
            <div class="col-xs-8 col-md-7">
            </div>
            @if (Auth::check())
            <div class="action col-xs-4 col-md-5 text-right">
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
        </footer>
        </div>
    </article>
    @endif
    @endforeach
</div>
<div class="text-center">
    {{ $posts->links() }}
</div>