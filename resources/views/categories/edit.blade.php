@extends('layouts.app')

@section('title', 'Young Mentorship - Categorías')

@section('content')

	<h2>Editar Categoría</h2>

	<form class="alt" method="POST" action="/categories/{{ $category->id }}">

		{{ csrf_field() }}
		{{ method_field('PATCH') }}

		<div class="row uniform">

			<div class="12u$">
				<label for="name">Nombre</label>
				<input type="text" name="name" id="name" value="{{ $category->name }}" />
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

	<form class="alt" method="POST" action="{{ action('CategoryController@destroy', [$category->id]) }}">

		{{ csrf_field() }}
		{{ method_field('DELETE') }}

		<h3>Acciones</h3>
		<div class="6u 12u$">
			<input type="submit" value="Eliminar" class="special" name="submit" />
		</div>

	</form>

@endsection

