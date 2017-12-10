@extends('layouts.app')

@section('content')

@include('partials.meta-static')

    <div class="container">
        <h2 class="center">Olvidaste la Contraseña??</h2>
        <div class="divider"></div>

        <div class="row">

            <form class="alt" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div style="margin-top: 2em;" class="input-field col s12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <i class="material-icons prefix">email</i>
                        <label for="email">Correo Electrónico</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span>
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="submit" value="Reestablecer la Contraseña" class="waves-effect waves-light btn" />
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection
