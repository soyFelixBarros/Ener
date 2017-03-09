@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if (count($newspapers) > 0)
            <div class="panel panel-default panel-flush">
                <div class="panel-heading">Diarios</div>
                <ul class="nav settings-stacked-tabs">
                    <li{{ Request::is('/') ? ' class=active' : '' }}><a href="{{ route('home') }}">Todos</a></li>
                    @foreach ($newspapers as $newspaper)
                    <li{{ Request::is('newspaper/*') ? ' class=active' : '' }}><a href="{{ route('newspaper_show', ['newspaper' => $newspaper->slug]) }}">{{ $newspaper->name }}</a></li>
                    @endforeach
                </ul>
            </div><!-- .panel -->
            @endif
        </div>
        <div class="posts col-md-9">
        @include('shared.articles-list', ['articles' => $articles])
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection
