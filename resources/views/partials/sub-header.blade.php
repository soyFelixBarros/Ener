<div class="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h3 class="title">{{ $title }}</h3>
            </div>
            <div class="col-sm-4 text-right hidden-xs">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Inicio</a></li>
                    {{ $slot }}
                </ol>
            </div>
        </div>
    </div>
</div>
