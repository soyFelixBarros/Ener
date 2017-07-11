@extends('layouts.app')

@section('title', config('app.name'))
@section('description', 'Cablera.Online - Informarte de la mejor manera. Todas las noticias en un solo lugar.')

@section('content')
{{-- @include('shared.stories', ['stories' => $stories])
 --}}
@include('shared.posts', ['posts' => $posts, 'paginate' => false])
@endsection
