@if(count($posts) > 0)
    @if(isset($type) && $type == 'large')
        @foreach ($posts as $post)
        <article class="media mb-4">
            @if ($post->image != null)
            <a href="{{ $post->url }}" target="_blank" rel="bookmark">
                <img class="align-self-start mt-1 mr-3" src="/images/{{ $post->image }}?w=80&h=80&q=80&fit=crop-top&sharp=10&dpr=2" width="95" height="95" alt="{{ $post->title }}">
            </a>
            @endif
            <div class="media-body">
                <h6 class="mt-0"><a href="{{ $post->url }}" target="_blank" rel="bookmark">{{ $post->title }}</a></h6>
                <div class="mb-0">
                    <small>
                        @if (auth()->check())
                            @if (auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin_posts_edit', ['id' => $post->id]) }}" class="text-info" title="Editar noticia"><i class="far fa-edit"></i></a> /
                            @endif
                        @endif
                        @if(! request()->is('newspapers/*'))
                        <a href="{{ route('newspaper_show', ['newspaper' => $post->newspaper->slug]) }}" class="text-dark">{{ $post->newspaper->name }}</a> - 
                        @endif
                        <time class="timeago text-muted" datetime="{{ $post->created_at }}" title="{{ $post->created_at }}"></time>
                    </small>
                </div>
                @if ($post->content)
                {{ str_limit($post->content, 110) }}
                @endif
            </div>
        </article><!-- .media -->
        @endforeach
    @elseif(isset($type) && $type == 'card')
        @foreach ($posts as $post)
        <article class="card mb-3">
            @if ($post->image != null && $post->image->width > 950 && $post->image->height < 950)
            <a href="{{ $post->url }}" target="_blank" rel="bookmark">
                <img class="card-img-top" src="/images/{{ $post->image }}?w=538&h=300&q=80&fit=crop-center&sharp=10&dpr=2" alt="{{ $post->title }}">
            </a>
            @endif 
            <div class="card-body pt-3">
                <h5 class="card-title"><a href="{{ $post->url }}" target="_blank" rel="bookmark">{{ $post->title }}</a></h5>
                @if ($post->content)
                <p class="card-text">{{ str_limit($post->content, 185) }}</p>
                @endif
                <p class="card-text font-weight-light">
                    <small>
                        @if (auth()->check())
                            @if (auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin_posts_edit', ['id' => $post->id]) }}" class="text-info" title="Editar noticia"><i class="far fa-edit"></i></a> /
                            @endif
                        @endif
                        @if(! request()->is('newspapers/*'))
                        <a href="{{ route('newspaper_show', ['newspaper' => $post->newspaper->slug]) }}" class="text-dark">{{ $post->newspaper->name }}</a> - 
                        @endif
                        <time class="timeago text-muted" datetime="{{ $post->created_at }}" title="{{ $post->created_at }}"></time>
                    </small>
                </p>
            </div><!-- .card-body -->
        </article><!-- .card -->
        @endforeach
    @else
    <section class="card-columns">
         @foreach ($posts as $post)
        <article class="card mb-4">
            @if ($post->image != null)
            <a href="{{ $post->url }}" target="_blank" rel="bookmark">
                <img class="card-img-top" src="/images/{{ $post->image }}?w=354&q=80&fit=crop-top&sharp=10&dpr=2" alt="{{ $post->title }}">
            </a>
            @endif 
            <div class="card-body">
                <h5 class="card-title"><a href="{{ $post->url }}" target="_blank" rel="bookmark">{{ $post->title }}</a></h5>
                @if ($post->content)
                <p class="card-text">{{ str_limit($post->content, 110) }}</p>
                @endif
                <p class="card-text font-weight-light">
                    <small>
                        @if (auth()->check())
                            @if (auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin_posts_edit', ['id' => $post->id]) }}" class="text-info" title="Editar noticia"><i class="far fa-edit"></i></a> /
                            @endif
                        @endif

                         @if(! request()->is('newspapers/*'))
                        <a href="{{ route('newspaper_show', ['newspaper' => $post->newspaper->slug]) }}" class="text-dark">{{ $post->newspaper->name }}</a> - 
                        @endif
                        <time class="timeago text-muted" datetime="{{ $post->created_at }}" title="{{ $post->created_at }}"></time>
                    </small>
                </p>
            </div><!-- .card-body -->
        </article><!-- .card -->
        @endforeach
    </section><!-- .card-columns -->
    @endif

    @if(isset($paginate))
    <div class="row justify-content-md-center mt-4">
        {{ $posts->links() }}
    </div>
    @endif
@endif