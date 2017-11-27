@extends('layouts.app')

@section('content')

<h2>Ingresa a Young Mentorship</h2>

<form class="alt" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="row uniform">

        <div class="6u 12u$(xsmall) form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Correo Electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span>
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="6u 12u$(xsmall) form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>
            @if ($errors->has('password'))
                <span>
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="6u 12u$(small)">
            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">Recuérdame</label>
        </div>

        <div class="12u$">
            <ul class="actions">
                <li>
                    <input type="submit" value="Ingresar" class="special" />
                </li>
                <a href="{{ route('password.request') }}">
                    Olvidaste tu contraseña?
                </a>
            </ul>
        </div>
    </div>

</form>

@endsection
