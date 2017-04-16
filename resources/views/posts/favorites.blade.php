@extends('layouts.base')
@section('title', 'Post favorites')
@section('content.base')
@include('shared.posts', ['posts' => $favorites])
@endsection