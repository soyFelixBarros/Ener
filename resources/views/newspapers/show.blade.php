@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9">
        @include('shared.articles', ['articles' => $articles])
        </div>
        <div class="col-sm-3">
        @if (count($newspapers) > 0)
        @include('sidebar.newspapers', ['newspapers' => $newspapers])
        @endif
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection
