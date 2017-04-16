<div class="panel panel-default panel-flush">
    <div class="panel-heading">Diarios</div>
    <ul class="nav settings-stacked-tabs">
{{--         <li{{ Request::is('/') ? ' class=active' : '' }}><a href="{{ route('home') }}">Todos</a></li>
 --}}        @foreach ($newspapers as $newspaper)
        <li{{ Request::is('newspaper/'.$newspaper->slug) ? ' class=active' : '' }}><a href="{{ route('newspaper_show', ['newspaper' => $newspaper->slug]) }}">{{ $newspaper->name }}</a></li>
        @endforeach
    </ul>
</div><!-- .panel -->