@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="list-group mb-3">
                <a href="{{ route('admin.sources.index') }}" class="list-group-item list-group-item-action{{ request()->is('admin/sources*') ? ' active' : '' }}">Fuentes</a>
            </div><!-- .list-group -->
    	</div>
        <div class="col-12 col-md-9">
        @if (session('status'))
            @alert(['type' => 'success'])
            {{ session('status') }}
            @endalert
        @endif
        
        @yield('content.base')
        </div>
    </div><!-- .row -->
</div>
@endsection