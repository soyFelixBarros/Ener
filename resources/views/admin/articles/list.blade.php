@extends('layouts.admin')
@section('title', 'Articles')
@section('content.admin')
@include('shared.articles', ['articles' => $articles])
@endsection