@extends('layouts.app')

@section('content')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}"/>
@endsection

@include('partials.meta-static')

    <div class="container">
        <h1 class="center">Servicios</h1>
        <div class="row">
            <div class="col s12">
                <nav>
                    <div class="nav-wrapper">
                        <form>
                            <div class="input-field teal">
                                <input id="search" type="search" placeholder="Qué servicio estas buscando...??" required>
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
                            <p>
                                <em>
                                    @foreach ($service->category as $category)
                                        <a href="{{ action('CategoryController@show', [$category->slug]) }}">|{{ $category->name }}|</a>
                                    @endforeach
                                </em>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{asset('/js/sweetalert2.js') }}" type="text/javascript" charset="utf-8"></script>
    @if (notify()->ready())
        <script>
            swal({
                title: "{!! notify()->message() !!}",
                text: "{!! notify()->option('text') !!}",
                type: "{{ notify()->type() }}",
                @if (notify()->option('timer'))
                    timer: {{ notify()->option('timer') }},
                    showConfirmButton: false
                @endif
            });
        </script>
    @endif

@endsection