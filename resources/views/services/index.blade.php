@extends('layouts.app')

@section('content')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
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
                            <span class="card-title activator grey-text text-darken-4">{{ $service->title }}<i class="material-icons textoTeal right">more_vert</i></span>
                            <br>
                            <p align="center"><a class="btn" href="{{ action('ServiceController@show', [$service->slug]) }}">Más</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">{{ $service->title }}<i class="material-icons textoTeal right">close</i></span>
                            <p><i class="material-icons textoTeal">account_circle</i><b>Emprendedor: </b><a class="textoTeal" href="{{ route('users.show', $service->user->username) }}">{{ $service->user->name }}</a></p>
                            <p><i class="material-icons textoTeal">monetization_on</i><b>Costo: </b>${{ money_format('%.2n', $service->cost) }} MXN</p>
                            <p><i class="material-icons textoTeal">location_on</i><b>Ubicación: </b>{{ $service->location }}</p>
                            <p><input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $service->averageRating }}" data-size="xs" disabled=""></p>
                            <p><i class="material-icons textoTeal">date_range</i><b>Creado: </b>{{ $service->updated_at->diffForHumans() }}</p>
                            <p align="center">
                                <em>
                                    @foreach ($service->category as $category)
                                        <a class="textoTeal" href="{{ action('CategoryController@show', [$category->slug]) }}">|{{ $category->name }}|</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script type="text/javascript" src="{{asset('/js/sweetalert2.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/rateable.js') }}"></script>
    <script type="text/javascript">
        $("#input-id").rating();
    </script>

@endsection