@extends('layouts.app')

@section('title', 'Young Mentorship - Categorías')

@section('content')

@include('partials.meta-static')

    <div class="container">
        <h2 class="center">Servicios recientes en {{ $category->name }}</h2>
        <div class="divider"></div>

        <div style="margin-top: 2em;" class="row">
            @foreach ($category->service as $service)
                <div class="col s12 m6 l4">
                    <div class="card medium">
                        <div class="card-image waves-effect waves-block waves-light">
                            @if ($service->photo)
                                <img class="activator" src="/images/{{ $service->photo ? $service->photo->photo : '' }}" alt="{{ str_limit($service->title, 50) }}" />
                            @else
                                <img class="activator" src="{{ asset('images/bg.jpg') }}">
                            @endif
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">{{ $service->title }}<i class="material-icons right">more_vert</i></span>
                            <br>
                            <p align="center"><a class="btn" href="{{ action('ServiceController@show', [$service->slug]) }}">Más</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">{{ $service->title }}<i class="material-icons right">close</i></span>
                            <p><i class="material-icons">account_circle</i><b>Emprendedor: </b><a href="#">{{ $service->user->name }}</a></p>
                            <p><i class="material-icons">monetization_on</i><b>Costo: </b>${{ money_format('%.2n', $service->cost) }} MXN</p>
                            <p><i class="material-icons">location_on</i><b>Ubicación: </b>{{ $service->location }}</p>
                            <p><i class="material-icons">date_range</i><b>Creado: </b>{{ $service->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection

