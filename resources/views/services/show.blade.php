@extends('layouts.app')

@section('content')

	@include('partials.meta-dynamic')

	<!-- Main -->
	<div id="main">

		<!-- Post -->
		<section class="post">

			<header class="major">

				<span class="date">{{ $service->updated_at }}</span>
				@if ($service->photo)

					<div class="image main">
						<img src="/images/{{ $service->photo ? $service->photo->photo : '' }}" alt="{{ str_limit($service->title, 50) }}" />
					</div>

				@endif
				<h3>{{ $service->title }}</h3>
				<p>{!! $service->description !!}</p>
				<p>
					@foreach ($service->category as $category)
						<a href="{{ action('CategoryController@show', [$category->slug]) }}">|{{ $category->name }}|</a>
					@endforeach <br>
					<b>Ubicación: </b>{{ $service->location }} <br>
					<b>Costo: </b>${{ $service->cost }} MXN
				</p>

			</header>

		</section>

		<ul class="actions">

            <li>
                <a href="{{ action('ServiceController@edit', [$service->id]) }}" class="button">Editar</a>
            </li>

        </ul>

	</div>

@endsection

