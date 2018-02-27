@if(count($posts) > 0)
    @if(isset($type) && $type == 'large')
        @foreach ($posts as $post)
        <div class="media mb-4">
            @if ($post->image != null)
            <a href="{{ $post->url }}" target="_blank" rel="bookmark">
                <img class="align-self-start mt-1 mr-3" src="/images/{{ $post->image }}?w=80&h=80&q=80&fit=crop-top&sharp=10" width="80" height="80" alt="{{ $post->title }}">
            </a>
            @endif
            <div class="media-body">
                <h6 class="mt-0"><a href="{{ $post->url }}" target="_blank" rel="bookmark">{{ $post->title }}</a></h6>
                <div class="mb-0">
                    <small>
                        @if (Auth::check())
                            @if (Auth::user()->hasRole('admin'))
                            <a href="{{ route('admin_posts_edit', ['id' => $post->id]) }}" class="text-info" title="Edit post">
                                <i class="far fa-edit"></i>
                            </a> /
                            @endif
                        @endif
                        @if(! request()->is('newspapers/*'))
                        <a href="{{ route('newspaper_show', ['newspaper' => $post->newspaper->slug]) }}" class="text-dark">{{ $post->newspaper->name }}</a> - 
                        @endif
                        <time class="timeago text-muted" datetime="{{ $post->updated_at }}" title="{{ $post->updated_at }}"></time>
                    </small>
                </div>
                @if ($post->content)
                {{ str_limit($post->content, 110) }}
                @endif
            </div>
        </div><!-- .media -->
        @endforeach
    @else
    <div class="card-columns">
         @foreach ($posts as $post)
        <div class="card">
             @if ($post->image != null)
                @if($post->image->width > $post->image->height)
                <a href="{{ $post->url }}" target="_blank" rel="bookmark"><img class="card-img-top" src="/images/{{ $post->image }}?w=354&h=254&q=80&fit=crop-top&sharp=10" alt="{{ $post->title }}"></a>
                @else
                <a href="{{ $post->url }}" target="_blank" rel="bookmark"><img class="card-img-top" src="/images/{{ $post->image }}?w=354&h=531&q=80&fit=crop-top&sharp=10" alt="{{ $post->title }}"></a>
                @endif
            @endif 
            <div class="card-body">
                <h5 class="card-title"><a href="{{ $post->url }}" target="_blank" rel="bookmark">{{ $post->title }}</a></h5>
                @if ($post->content)
                <p class="card-text">{{ str_limit($post->content, 110) }}</p>
                @endif
                <p class="card-text font-weight-light">
                    <small>
                        @if (Auth::check())
                            @if (Auth::user()->hasRole('admin'))
                            <a href="{{ route('admin_posts_edit', ['id' => $post->id]) }}" class="text-info" title="Edit post">
                                <i class="far fa-edit"></i>
                            </a> /
                            @endif
                        @endif

                         @if(! request()->is('newspapers/*'))
                        <a href="{{ route('newspaper_show', ['newspaper' => $post->newspaper->slug]) }}" class="text-dark">{{ $post->newspaper->name }}</a> - 
                        @endif
                        <time class="timeago text-muted" datetime="{{ $post->updated_at }}" title="{{ $post->updated_at }}"></time>
                    </small>
                </p>
            </div><!-- .card-body -->
        </div><!-- .card -->
        @endforeach
    </div><!-- .card-columns -->
    @endif

    @if(isset($paginate))
    <div class="row justify-content-md-center mt-4">
        {{ $posts->links() }}
    </div>
    @endif
@endif