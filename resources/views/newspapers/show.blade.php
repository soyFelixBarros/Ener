@extends('layouts.app')

@section('title', $title)

@section('content')
@include('shared.posts', ['posts' => $posts])
@endsection
