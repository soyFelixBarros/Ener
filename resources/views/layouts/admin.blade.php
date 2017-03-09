@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default panel-flush">
                <div class="panel-heading">Administración</div>
                <ul class="nav settings-stacked-tabs">
                    <li{{ Request::is('admin/tags*') ? ' class=active' : '' }}>
                        <a href="#">Tags</a>
                    </li>
                    <li{{ Request::is('admin/newspapers*') ? ' class=active' : '' }}>
                        <a href="#">Newspapers</a>
                    </li>
                    <li{{ Request::is('admin/articles*') ? ' class=active' : '' }}>
                        <a href="{{ route('article') }}">Articles</a>
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