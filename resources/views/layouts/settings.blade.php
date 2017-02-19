@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @if (Request::is('settings/*'))
    		<div class="panel panel-default panel-flush">
    			<div class="panel-heading">Settings</div>
				<ul class="nav settings-stacked-tabs">
					<li{{ Request::is('settings/profile') ? ' class=active' : '' }}>
                        <a href="{{ route('profile') }}">Profile</a>
                    </li>
					<li{{ Request::is('settings/security') ? ' class=active' : '' }}>
                        <a href="/settings/security">Security</a>
                    </li>
				</ul>
    		</div><!-- .panel -->
            @endif
    	</div>
        <div class="col-md-8">
        @include('shared.status')
        @yield('content.settings')
        </div>
    </div><!-- .row -->
</div>
@endsection