@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default panel-flush">
                <div class="panel-heading">Administración</div>
                <ul class="nav settings-stacked-tabs">
                    <li{{ Request::is('admin/tags*') ? ' class=active' : '' }}>
                        <a href="{{ route('admin_tags') }}">Tags</a>
                    </li>
                    <li{{ Request::is('admin/posts*') ? ' class=active' : '' }}>
                        <a href="{{ route('admin_posts') }}">Posts</a>
                    </li>
                    <li{{ Request::is('admin/users*') ? ' class=active' : '' }}>
                        <a href="{{ route('admin_users') }}">Users</a>
                    </li>
                </ul>
            </div><!-- .panel -->
    	</div>
        <div class="col-md-9">
        @include('shared.status')
        @yield('content.admin')
        </div>
    </div><!-- .row -->
</div>
@endsection