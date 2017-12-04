@extends('layouts.app')

@section('title', 'Young Mentorship - Categorías')

@section('content')

	<!-- Main -->
    <div id="main">

    	<h2>Servicios recientes en {{ $category->name }}</h2>

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

