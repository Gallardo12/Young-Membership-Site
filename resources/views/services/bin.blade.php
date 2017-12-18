@extends('layouts.app')

@section('content')

@include('partials.meta-static')

    <div class="container">
        <h2 class="center">Servicios (Papelera)</h2>
        <div class="divider"></div>

         <div style="margin-top: 2em;" class="row">
            @foreach ($deletedServices as $service)
                <div class="col s12 m6">
                    <div class="card large">
                        <div class="card-image">
                            @if ($service->photo)
                                <img class="materialboxed responsive-img" src="/images/{{ $service->photo ? $service->photo->photo : '' }}" alt="{{ str_limit($service->title, 50) }}" />
                                <a href="{{ action('ServiceController@show', [$service->slug]) }}"><span class="card-title">{{ $service->title }}</span></a>
                            @else
                                <img src="{{ asset('images/bg.jpg') }}">
                                <a href="{{ action('ServiceController@show', [$service->slug]) }}"><span class="card-title">{{ $service->title }}</span></a>
                            @endif
                        </div>
                        <div class="card-content">
                            <p class="flow-text">
                                <b>Costo: </b>${{ $service->cost }} MXN <br>
                                <b>Ubicación: </b>{{ $service->location }}
                            </p>
                            <br>
                            <div class="divider"></div>
                        </div>
                        <div class="card-action text-teal">
                            <a class="flow-text btn-large" href="{{ action('ServiceController@restore', [$service->id]) }}">Restaurar</a>
                            <a class="flow-text btn-large red" href="{{ action('ServiceController@destroyService', [$service->id]) }}">Eliminar</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection