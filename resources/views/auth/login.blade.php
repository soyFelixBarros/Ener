@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            @include('shared.status')
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>
                            <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                             @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
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
                                <label class="form-check-label">Remember Me</label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
