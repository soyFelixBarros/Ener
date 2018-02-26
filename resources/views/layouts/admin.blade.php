@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('admin_posts') }}" class="list-group-item list-group-item-action">Posts</a>
                <a href="{{ route('admin_newspapers') }}" class="list-group-item list-group-item-action">Newspapers</a>
                <a href="{{ route('admin_users') }}" class="list-group-item list-group-item-action">Users</a>
                <a href="{{ route('admin_subscribers') }}" class="list-group-item list-group-item-action">Subscribers</a>
                <a href="{{ route('admin_links') }}" class="list-group-item list-group-item-action">Links</a>
            </div><!-- .list-group -->
    	</div>
        <div class="col-md-9">
        @include('shared.status')
        @yield('content.admin')
        </div>
    </div><!-- .row -->
</div>
@endsection