
    @if(count($posts) > 0)
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
						@if(! request()->is('newspapers/*'))
						<a href="{{ route('newspaper_show', ['newspaper' => $post->newspaper->slug]) }}" class="text-dark">{{ $post->newspaper->name }}</a> - 
						@endif
						<time class="timeago text-muted" datetime="{{ $post->created_at }}" title="{{ $post->created_at }}"></time>
					</small>
				</p>
			</div><!-- .card-body -->
		</div><!-- .card -->
		@endforeach
	</div><!-- .card-columns -->
	@endif
    
    @if(isset($paginate))
    {{ $posts->links() }}
    @endif