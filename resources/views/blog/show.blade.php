@extends('layouts.app')

@section('title', 'Young Mentorship -- Noticias')

@section('content')

	<!-- Main -->
	<div id="main">

		<!-- Post -->
		<section class="post">

			<header class="major">

				<span class="date">{{ $blog->updated_at }}</span>
				<h1>{{ $blog->title }}</h1>
				<p>Aenean ornare velit lacus varius enim ullamcorper proin aliquam<br />
				facilisis ante sed etiam magna interdum congue. Lorem ipsum dolor<br />
				amet nullam sed etiam veroeros.</p>

			</header>

			<div class="image main"><img src="../images/pic02.jpg" alt="" /></div>
			<p>{{ $blog->body }}</p>

		</section>

		<ul class="actions">

            <li>
                <a href="{{ action('BlogController@edit', [$blog->id]) }}" class="button">Editar</a>
            </li>

        </ul>

	</div>

@endsection

