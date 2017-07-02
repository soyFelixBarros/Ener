@extends('layouts.app')

@section('title', config('app.name'))
@section('description', 'Cablera.Online - Noticias de Chaco.')

@section('content')
{{-- @include('shared.stories', ['stories' => $stories])
 --}}
@include('shared.posts', ['posts' => $posts, 'paginate' => false])
@endsection
