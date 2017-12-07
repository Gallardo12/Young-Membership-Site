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
                                <img class="materialboxed" src="/images/{{ $service->photo ? $service->photo->photo : '' }}" alt="{{ str_limit($service->title, 50) }}" />
                                <span class="card-title">{{ $service->title }}</span>
                            @else
                                <img src="{{ asset('images/bg.jpg') }}">
                            @endif
                        </div>
                        <div class="card-content">
                            <p class="flow-text">
                                <b>Costo: </b>${{ $service->cost }} MXN <br>
                                <b>Ubicación: </b>{{ $service->location }}
                            </p>
                            <div class="divider"></div>
                            <p class="flow-text" align="center">
                                @foreach ($service->category as $category)
                                    <a href="{{ action('CategoryController@show', [$category->slug]) }}">|{{ $category->name }}|</a>
                                @endforeach
                            </p>
                            <div class="divider"></div>
                        </div>
                        <div class="card-action">
                            <a href="{{ action('ServiceController@show', [$service->id]) }}">Más</a>
                            <a href="#" class="btn-flat disabled"><b>{{ $service->updated_at }}</b></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection