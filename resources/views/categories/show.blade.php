@extends('layouts.app')

@section('title', 'Young Mentorship - Categorías')

@section('content')

@include('partials.meta-static')

    <div class="container">
        <h2 class="center">Servicios recientes en {{ $category->name }}</h2>
        <div class="divider"></div>

        <div style="margin-top: 2em;" class="row">
            @foreach ($category->service as $service)
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
                            <p style="margin-left: 2em;" class="right-align"><b>Creado el: </b><em>{{ $service->updated_at }}</em></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection

