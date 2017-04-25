@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        @if (Request::is('settings/*'))
        @include('shared.nav-settings')
        @endif
	</div>
    <div class="col-md-9">
    @include('shared.status')
    @yield('content.base')
    </div>
</div><!-- .row -->
@endsection