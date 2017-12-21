@extends('layouts.app')

@section('content')

@include('partials.meta-static')

<div class="container">
    <h2 class="center-align">Se parte de Young<span class="textoTeal">México</span></h2>
    <div class="divider"></div>

    <div class="row">
        <form class="alt" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="row">
                <div style="margin-top: 2em;" class="input-field col s12 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <i class="material-icons prefix">face</i>
                    <label for="username">Usuario</label>
                    <input id="username" type="text" name="username" value="{{ old('username') }}" autofocus>
                    @if ($errors->has('username'))
                        <span>
                            <strong class="red-text">{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div style="margin-top: 2em;" class="input-field col s12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <i class="material-icons prefix">account_circle</i>
                    <label for="name">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span>
                            <strong class="red-text">{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <i class="material-icons prefix">email</i>
                    <label for="email">Correo Electrónico</label>
                    <input id="email" type="email" data-error="wrong" data-success="right" name="email" value="{{ old('email') }}">
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
                    <input id="password" type="password" name="password">
                    @if ($errors->has('password'))
                        <span>
                            <strong class="red-text">{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <label for="password-confirm">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" name="password_confirmation">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="submit" value="Registrarse" class="waves-effect waves-light btn" />
                </div>
            </div>
        </form>
    </div>

@endsection
