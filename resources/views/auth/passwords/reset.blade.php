@extends('layouts.app')

@section('content')

@include('partials.meta-static')

    <div class="container">
        <h2 class="center">Reestablecer la contraseña</h2>
        <div class="divider"></div>

        <form class="alt" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="row">
                <div class="input-field col s12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <i class="material-icons prefix">email</i>
                    <label for="email">Correo Electrónico</label>
                    <input id="email" type="email" name="email" value="{{ $email or old('email') }}" required autofocus>
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
                    <label for="password">Nueva Contraseña</label>
                    <input id="password" type="password" name="password" required>
                    @if ($errors->has('password'))
                        <span>
                            <strong class="red-text">{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <i class="material-icons prefix">lock</i>
                    <label for="password-confirm">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required>
                    @if ($errors->has('password_confirmation'))
                        <span>
                            <strong class="red-text">{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="submit" value="Reestablecer Contraseña" class="waves-effect waves-light btn" />
                </div>
            </div>

        </form>

    </div>

@endsection
