@extends('layouts.admin')
@section('title', 'Posts')
@section('content.admin')
@include('shared.posts', ['posts' => $posts])
@endsection