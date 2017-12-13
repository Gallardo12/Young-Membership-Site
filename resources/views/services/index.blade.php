@extends('layouts.app')

@section('content')

@include('partials.meta-static')

    <div class="container">
        <h1 class="center">Servicios</h1>
        <div class="row">
            <div class="col s12">
                <nav>
                    <div class="nav-wrapper">
                        <form>
                            <div class="input-field teal">
                                <input id="search" type="search" placeholder="Aquí encontraras los servicios que necesites..." required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
        <div class="divider"></div>
        <h3 class="center">Últimos servicios</h3>
        <div class="row">
            @foreach ($services as $service)
                <div class="col s12 m6">
                    <div class="card large">
                        <div class="card-image">
                            @if ($service->photo)
                                <img class="materialboxed responsive-img" data-caption="{{ $service->title }}" src="/images/{{ $service->photo ? $service->photo->photo : '' }}" alt="{{ str_limit($service->title, 50) }}" />
                                <a href="{{ action('ServiceController@show', [$service->id]) }}"><span class="card-title">{{ $service->title }}</span></a>
                            @else
                                <img src="{{ asset('images/bg.jpg') }}">
                                <a href="{{ action('ServiceController@show', [$service->id]) }}"><span class="card-title">{{ $service->title }}</span></a>
                            @endif
                        </div>
                        <div class="card-content">
                            <p class="flow-text">
                                <b>Costo: </b>${{ $service->cost }} MXN <br>
                                <b>Ubicación: </b>{{ $service->location }}
                            </p>
                        </div>
                        <div class="card-action valign-wrapper">
                            <a class="flow-text btn-large" href="{{ action('ServiceController@show', [$service->id]) }}">Más</a>
                            <p style="margin-left: 2em;" class="right-align"><b>Creado: </b><em>{{ $service->updated_at->diffForHumans() }}</em></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection