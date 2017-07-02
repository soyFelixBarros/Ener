@extends('layouts.app')

@section('title', 'Story')

@section('content')
@include('shared.stories', ['stories' => $stories])
@endsection
