<div class="list-group">
	<a href="{{ route('profile') }}" class="list-group-item list-group-item-action{{ request()->is('settings/profile*') ? ' active' : '' }}">Perfil</a>
	<a href="{{ route('security') }}" class="list-group-item list-group-item-action{{ request()->is('settings/security*') ? ' active' : '' }}">Seguridad</a>
</div>