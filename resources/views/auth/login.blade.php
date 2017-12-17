@extends('layouts.app')

@section('content')

@include('partials.meta-static')

<div class="container">
    <h2 class="center">Ingresa a Young<span class="textoTeal">México</span></h2>
    <div class="divider"></div>

    <div class="row">
        <form class="alt" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="row">
                <div style="margin-top: 2em;" class="input-field col s12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <i class="material-icons prefix">email</i>
                    <label for="email">Correo Electrónico</label>
                    <input id="email" type="email" data-error="wrong" data-success="right" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span>
                            <strong class="red-text">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <i class="material-icons prefix">lock</i>
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required>
                    @if ($errors->has('password'))
                        <span>
                            <strong class="red-text">{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <p>
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Recuérdame</label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="submit" value="Ingresar" class="waves-effect waves-light btn" />
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <a href="{{ route('password.request') }}"> Olvidaste tu contraseña? </a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
