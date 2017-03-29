<div class="posts">
    @foreach ($posts as $post)
    <div class="panel panel-default">
        <div class="panel-body">
            <article class="media">

                @if ($post->image !== null)
                <div class="media-left">
                    <a href="{{ $post->url }}" target="_blank"><img class="media-object" src="{{ $post->image }}"></a>
                </div>
                @endif
                <div class="media-body"> 
                @if (count($post->tags) > 0)
                <ul class="tags list-inline">
                    @foreach ($post->tags as $tag)
                    <li><a href="{{ route('tag_show', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
                @endif
                <header>
                    <h1 class="title media-heading"><a href="{{ $post->url }}" target="_blank">{{ $post->title }}</a></h1>
                </header>
                @if ($post->summary)
                <p class="summary">{{ $post->summary }}</p>
                @endif
                <footer class="row">
                    <div class="newspaper-datetime col-md-10">
                        {{ $post->newspaper->name }} -
                        <time class="timeago" datetime="{{ $post->created_at }}">{{ $post->created_at }}</time>
                    </div>
                    @if (Auth::check())
                    <div class="col-md-2 text-right">
                        @if (Auth::user()->hasRole('admin'))
                            <a href="{{ route('admin_posts_edit', ['id' => $post->id]) }}">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                        </div>
                        @endif
                    @endif
                </footer>
                </div>
            </article>
        </div>
    </div>
    @endforeach
</div>
<div class="text-center">
    {{ $posts->links() }}
</div>