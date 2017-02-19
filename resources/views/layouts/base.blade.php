@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @if (Request::is('settings/*'))
            @include('shared.nav-settings')
            @endif
    	</div>
        <div class="col-md-8">
        @include('shared.status')
        @yield('content.base')
        </div>
    </div><!-- .row -->
</div>
@endsection