@extends('layouts.app')

@section('content')

<h2>Reestablecer la contraseña</h2>

<form class="alt" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}

    <div class="row uniform">

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="12u$ form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Correo Electrónico</label>
            <input id="email" type="email" name="email" value="{{ $email or old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span>
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="6u 12u$(xsmall) form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Nueva Contraseña</label>
            <input id="password" type="password" name="password" required>
            @if ($errors->has('password'))
                <span>
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="6u 12u$(xsmall) form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm">Confirmar Contraseña</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
            @if ($errors->has('password_confirmation'))
                <span>
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <div class="12u$">
            <ul class="actions">
                <li>
                    <input type="submit" value="Reestablecer Contraseña" class="special" />
                </li>
            </ul>
        </div>

    </div>

</form>

@endsection
