@extends('layouts.app')

@section('content')

@include('partials.meta-static')

<div class="container">
    <h2 class="center-align">Se parte de Young<span class="textoTeal">México</span></h2>

    <form class="alt" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="row uniform">

            <div class="6u 12u$(xsmall) form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span>
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="6u 12u$(xsmall) form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
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

            <div class="6u 12u$(xsmall)">
                <label for="password-confirm">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" name="password_confirmation" required>
            </div>

            <div class="12u$">
                <ul class="actions">
                    <li>
                        <input type="submit" value="Registrarse" class="special" />
                    </li>
                </ul>
            </div>

        </div>

    </form>
</div>

@endsection
