@extends('layouts.app')

@section('content')

<h2>Olvidaste la Contraseña??</h2>

<form class="alt" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}

    <div class="row uniform">

        <div class="6u 12u$(xsmall) form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Correo Electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span>
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="12u$">
            <ul class="actions">
                <li>
                    <input type="submit" value="Reestablecer la Contraseña" class="special" />
                </li>
            </ul>
        </div>

    </div>

</form>

@endsection
