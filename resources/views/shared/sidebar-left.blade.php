<ul class="list-group list-group-flush">
    @foreach($categories as $category)
    <li class="list-group-item"><a href="{{ route('category_show', ['slug' => $category->slug]) }}" class="text-dark">{{ $category->name }}</a></li>
    @endforeach
</ul>