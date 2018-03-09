@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header">Registrarse</div>
                <div class="card-body text-center">
                    <a href="{{ route('login.social', ['provider' => 'facebook']) }}" class="btn btn-primary" target="_blank" style="background-color:#4963A4;">Continuar con Facebook</a>
                </div>
                <hr class="mt-0 mb-1" />
                <form class="card-body" role="form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Correo electrónico</label>
                        
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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

                    <div class="form-group">
                        <label for="password-confirm" class="control-label">Confirmar contraseña</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Registro</button>
                    <a class="btn btn-link float-right" href="{{ route('login') }}">¿Tienes cuenta?</a>
                </form><!-- .card-body -->
            </div><!-- .card -->
        </div>
    </div>
</div>
@endsection
