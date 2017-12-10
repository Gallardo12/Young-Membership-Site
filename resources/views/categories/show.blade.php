@extends('layouts.app')

@section('title', 'Young Mentorship - Categorías')

@section('content')

@include('partials.meta-static')

    <div class="container">
        <h2 class="center">Servicios recientes en {{ $category->name }}</h2>

        <div class="row">
            @foreach ($category->service as $service)
                <div class="col s12 m6">
                    <div class="card large">
                        <div class="card-image">
                            @if ($service->photo)
                                <img class="materialboxed responsive-img" src="/images/{{ $service->photo ? $service->photo->photo : '' }}" alt="{{ str_limit($service->title, 50) }}" />
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
                            <br>
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

	<!-- Main -->
    <div id="main">



        <!-- Posts -->
        <section class="posts">

            @foreach ($category->service as $service)

                <article>
                    <header>
                        <h3>
                            <a href="{{ action('ServiceController@show', [$service->id]) }}">{{ $service->title }}</a>
                        </h3>
                        <span class="date">{{ $service->updated_at }}</span>
                        <a disabled class="image fit">
                                <img src="../images/pic02.jpg" />
                            </a>
                        <p>{{ $service->description }}</p>
                        <ul class="actions">
                            <li>
                                <a href="{{ action('ServiceController@show', [$service->id]) }}" class="button">Más</a>
                            </li>
                        </ul>
                    </header>
                </article>

            @endforeach

        </section>

    </div>

@endsection

