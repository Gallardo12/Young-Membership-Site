@extends('layouts.app')

@section('title', 'Young Mentorship -- Noticias')

@section('content')

	<h2>Nuevo Post</h2>

	<form class="alt" method="POST" action="{{ route('blog.store') }}">

		{{ csrf_field() }}

		<div class="row uniform">

			<div class="12u$">
				<label for="title">Título</label>
				<input type="text" name="title" id="title" value="" />
			</div>

			<!-- Break -->
			<div class="12u$">
				<label for="body">Contenido</label>
				<textarea name="body" id="body" rows="6"></textarea>
			</div>

			<!-- Break -->
			<div class="12u$">
				<ul class="actions">
					<li>
						<input type="submit" value="Guardar" class="special" name="submit" />
					</li>
				</ul>
			</div>

		</div>

	</form>

@endsection

