@extends('layouts.admin')
@section('title', 'Articles')
@section('content.admin')
@include('shared.articles-list', ['articles' => $articles])
@endsection