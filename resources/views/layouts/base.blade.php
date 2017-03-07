@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if (Request::is('admin/*'))
            <div class="panel panel-default panel-flush">
                <div class="panel-heading">Admin</div>
                <ul class="nav settings-stacked-tabs">
                    <li{{ Request::is('admin/articles') ? ' class=active' : '' }}>
                        <a href="{{ route('article') }}">Articles</a>
                    </li>
                </ul>
            </div><!-- .panel -->
            @endif

            @if (Request::is('settings/*'))
            @include('shared.nav-settings')
            @endif
    	</div>
        <div class="col-md-9">
        @include('shared.status')
        @yield('content.base')
        </div>
    </div><!-- .row -->
</div>
@endsection