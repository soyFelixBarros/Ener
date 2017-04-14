<div class="posts panel panel-default ">
    @foreach ($posts as $post)
    <article class="clearfix">
        @if ($post->image !== null)
        <div class="col-sm-3 image">
            <a href="{{ $post->url }}" target="_blank"><img src="/uploads/images/{{ $post->image }}" class="img-responsive" alt="{{ $post->title }}"></a>
        </div>
        <div class="col-sm-9">
        @else
        <div class="col-sm-12">
        @endif 
        @if (count($post->tags) > 0)
        <ul class="tags list-inline">
            @foreach ($post->tags as $tag)
            <li><a href="{{ route('tag_show', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
        @endif
        <header>
            <h1 class="title"><a href="{{ $post->url }}" target="_blank">{{ $post->title }}</a></h1>
        </header>
        @if ($post->summary)
        <p class="summary hidden-xs">{{ $post->summary }}</p>
        @endif
        <footer class="row">
            <div class="newspaper-datetime col-xs-10">
                {{ $post->newspaper->name }} -
                <time class="timeago" datetime="{{ $post->created_at }}">{{ $post->created_at }}</time>
            </div>
            @if (Auth::check())
            <div class="action col-xs-2 text-right">
                @if (Auth::user()->hasRole('admin'))
                <ul class="list-inline">
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
    @endforeach
</div>
<div class="text-center">
    {{ $posts->links() }}
</div>