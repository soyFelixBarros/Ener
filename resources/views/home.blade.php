@extends('layouts.app')

@section('title', config('app.name'))
@section('description', 'Informarte de la mejor manera. Todas las noticias de los diarios más importante de la provincia de Chaco, Argentina.')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-3">
        </div>
        <div class="col-sm-12 col-md-7">
        </div>
        <div class="col-sm-12 col-md-2">
            @include('shared.sidebar-right')
        </div>
    </div>
</div>
@endsection
