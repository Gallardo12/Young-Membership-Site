@extends('layouts.app')

@section('content')

@include('partials.meta-static')
                <!-- Posts -->
                <section class="posts">

                    @foreach ($services as $service)

                        <article>
                            <header>
                                <h3>
                                    <a href="{{ action('ServiceController@show', [$service->id]) }}">{{ $service->title }}</a>
                                </h3>
                                <span class="date">{{ $service->updated_at }}</span>
                                @if ($service->photo)
                                    <a disabled class="image fit">
                                        <img src="/images/{{ $service->photo ? $service->photo->photo : '' }}" alt="{{ str_limit($service->title, 50) }}" />
                                    </a>
                                @endif
                                <p>
                                    @foreach ($service->category as $category)
                                        <a href="{{ action('CategoryController@show', [$category->slug]) }}">|{{ $category->name }}|</a>
                                    @endforeach
                                </p>
                                <p>
                                    <b>Costo: </b>${{ $service->cost }} MXN <br>
                                    <b>Ubicación: </b>{{ $service->location }}
                                </p>
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