@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container">
    <h3 class="mb-4">
        {{ $title }}<br />
        <small class="text-muted">{{ $posts->count() }} resultados</small>
    </h3>
    @include('shared.posts-2', ['posts' => $posts, 'paginate' => true])
</div>
@endsection
