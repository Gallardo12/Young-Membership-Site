@extends('layouts.app')

@section('content')

@include('partials.meta-static')

    <div class="container">
        <h2 class="center">Nuevo mensaje</h2>
        <div class="row">
            <form action="{{ route('messages.store') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">subject</i>
                        <label for="subject">Asunto</label>
                        <input type="text" name="subject" value="{{ old('subject') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">message</i>
                        <label for="message">Mensaje</label>
                        <textarea name="message" class="materialize-textarea" cols="30" rows="10">{{ old('message') }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col s10 offset-s1">
                        @if($users->count() > 0)
                            <div class="input-field col s12">
                                <i class="material-icons prefix">supervisor_account</i>
                                <select multiple name="recipients[]">
                                    <option value="" disabled selected>Selecciona los participantes</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <label>Usuarios</label>
                              </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col s10 offset-s1">
                        <button type="submit" class="waves-effect waves-light btn">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
