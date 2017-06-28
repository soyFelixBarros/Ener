@extends('layouts.app')

@section('title', $title)

@section('content')
<ol class="breadcrumb">
  <li><a href="{{ url('/') }}">Inicio</a></li>
  <li class="active">{{ $title }}</li>
</ol>
@include('shared.posts', ['posts' => $posts])
@endsection
