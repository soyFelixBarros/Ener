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
                @include('auth.social-buttons')
                <hr class="mt-0 mb-0" />
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
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? '' : 'checked' }}>
                            <label class="form-check-label">Recuérdame</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                    <a class="btn btn-link pr-0 float-right" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </form><!-- .card-body -->
            </div><!-- .card -->
        </div><!-- .col- -->
    </div><!-- .row -->
</div><!-- .container -->
@endsection
