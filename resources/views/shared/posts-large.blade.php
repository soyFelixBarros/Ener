@if($posts->count() > 0)
<section class="row posts">
    @foreach ($posts as $post)
    @if ($post->parent_id == null)
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix">
    	<div class="row">
	        @if ($post->image != null)
	        <div class="col-xs-4 col-sm-5 col-md-3 col-lg-2 image">
	            <a href="{{ $post->url }}" target="_blank" rel="bookmark"><img src="/uploads/images/{{ $post->image }}" width="170" height="170" class="img-responsive" alt="{{ $post->title }}"></a>
	        </div>
	        <div class="col-xs-8 col-sm-7 col-md-9 col-lg-10">
	        @else
	        <div class="col-sm-12">
	        @endif 
	        <header>
	            <hgroup>
	                <h1 class="title"><a href="{{ $post->url }}" target="_blank" rel="bookmark">{{ $post->title }}</a></h1>
	                <h6 class="newspaper-datetime">
	                	@if (Auth::user()->hasRole('admin'))
			            <a href="{{ route('admin_posts_edit', ['id' => $post->id]) }}" title="Edit post">
			            	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			            </a> /
			            @endif
	                    <a href="{{ route('newspaper_show', ['newspaper' => $post->newspaper->slug]) }}">{{ $post->newspaper->name }}</a> - <time class="timeago" datetime="{{ $post->created_at }}" title="{{ $post->created_at }}"></time>
	                    @if ($post->category_id !== null)
	                    - <a href="{{ route('category_show', ['category' => $post->category->slug]) }}" class="{{ $post->category->slug }}">{{ $post->category->name }}</a>
	                    @endif
	                </h6>
	            </hgroup>
	        </header>
	        @if ($post->summary)
	        <p class="summary">{{ $post->summary }}</p>
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