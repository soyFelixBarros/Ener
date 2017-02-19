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