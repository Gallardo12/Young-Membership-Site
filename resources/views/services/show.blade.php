@extends('layouts.app')

@section('title', 'Young Mentorship - Servicios')

@section('content')

	<!-- Main -->
	<div id="main">

		<!-- Post -->
		<section class="post">

			<header class="major">

				<span class="date">{{ $service->updated_at }}</span>
				<h1>{{ $service->title }}</h1>
				<p>{{ $service->description }}</p>
				<p>{{ $service->location }}</p>
				<p>
					@foreach ($service->category as $category)
						<a href="{{ action('CategoryController@show', [$category->slug]) }}">|{{ $category->name }}|</a>
					@endforeach
				</p>
				<p>${{ $service->cost }} MXN</p>

			</header>
			@if ($service->photo)

				<div class="image main">
					<img src="/images/{{ $service->photo ? $service->photo->photo : '' }}" alt="{{ str_limit($service->title, 50) }}" />
				</div>

			@endif

		</section>

		<ul class="actions">

            <li>
                <a href="{{ action('ServiceController@edit', [$service->id]) }}" class="button">Editar</a>
            </li>

        </ul>

	</div>

@endsection

