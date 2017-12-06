@extends('layouts.app')

@section('title', 'Young Mentorship -- Noticias')

@section('content')

	<h2>Modificar Post</h2>

	<form class="alt" method="POST" action="/blog/{{ $blog->id }}">

		{{ csrf_field() }}
		{{ method_field('PATCH') }}

		<div class="row uniform">

			<div class="12u$">
				<label for="title">Título</label>
				<input type="text" name="title" id="title" value="{{ $blog->title }}" />
			</div>

			<!-- Break -->
			<div class="12u$">
				<label for="body">Contenido</label>
				<textarea name="body" class="my-editor" id="body" rows="6">{{ $blog->body }}</textarea>
			</div>

			<!-- Break -->
			<div class="6u 12u$">
				<ul class="actions">
					<li>
						<input type="submit" value="Editar" class="special" name="submit" />
					</li>
				</ul>
			</div>

		</div>

	</form>

	<form class="alt" method="POST" action="{{ action('BlogController@destroy', [$blog->id]) }}">

		{{ csrf_field() }}
		{{ method_field('DELETE') }}

		<h3>Acciones</h3>
		<div class="6u 12u$">
			<input type="submit" value="Eliminar" class="special" name="submit" />
		</div>

	</form>


@endsection

