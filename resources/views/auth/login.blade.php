@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            @include('shared.status')
            <div class="card">
                <div class="card-header">
                    Iniciar sesión
                </div><!-- .card-header -->
                <form class="card-body" role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Correo electrónico</label>
                        <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </form><!-- .card-body -->
            </div><!-- .card -->
        </div><!-- .col- -->
    </div><!-- .row -->
</div><!-- .container -->
@endsection
