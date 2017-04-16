@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="row">
    <div class="col-sm-9 col-md-offset-2">
    @include('shared.posts', ['posts' => $posts])
    </div>
</div><!-- .row -->
@endsection
