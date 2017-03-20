<div class="posts">
    @foreach ($articles as $article)
    <div class="panel panel-default">
        <div class="panel-body">
            <article class="media">
                <div class="media-body"> 
                @if (count($article->tags) > 0)
                <ul class="tags list-inline">
                    @foreach ($article->tags as $tag)
                    <li><a href="{{ route('tag_show', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
                @endif
                <header>
                    <h1 class="title media-heading"><a href="{{ $article->link->url }}" target="_blank">{{ $article->title }}</a></h1>
                </header>
                @if ($article->summary)
                <p class="summary">{{ $article->summary }}</p>
                @endif
                <footer class="row">
                    <div class="newspaper-datetime col-md-10">
                        {{ $article->newspaper->name }} -
                        <time class="timeago" datetime="{{ $article->created_at }}">{{ $article->created_at }}</time>
                    </div>
                    @if (Auth::check())
                    <div class="col-md-2 text-right">
                        @if (Auth::user()->hasRole('admin'))
                            <a href="{{ route('admin_article_edit', ['id' => $article->id]) }}">
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
    {{ $articles->links() }}
</div>