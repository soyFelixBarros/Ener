@if (count($articles) > 0)
<div class="posts">
    @foreach ($articles as $article)
    <div class="panel panel-default">
        <div class="panel-body">
            <article class="media">
                <header>
                    @if (count($article->tags) > 0)
                    <ul class="tags list-inline">
                    @foreach ($article->tags as $tag)
                    <li><a href="{{ route('tag_show', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                    @endforeach
                    </ul>
                    @endif
                    <h1 class="title media-heading"><a href="{{ $article->link->url }}" target="_blank">{{ $article->title }}</a></h1>
                </header>
                @if ($article->summary)
                <p class="summary">{{ $article->summary }}</p>
                @endif
                <footer class="row">
                    <div class="col-md-10">
                        <span>{{ $article->newspaper->name }}</span> -
                        <time class="timeago" datetime="{{ $article->created_at }}"></time>
                    </div>
                    @if (Auth::check())
                    <div class="col-md-2 text-right">
                        <a href="{{ route('article_edit', ['id' => $article->id]) }}" role="button" class="btn btn-default btn-xs">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
                        </a>
                    </div>
                    @endif
                </footer>
            </article>
        </div>
    </div>
    @endforeach
</div>
<div class="text-center">
    {{ $articles->links() }}
</div>
@endif