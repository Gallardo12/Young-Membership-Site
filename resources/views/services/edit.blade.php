@extends('layouts.app')

@section('title', 'Young Mentorship - Servicios')

@section('content')

	<h2>Modificar Servicio</h2>

	<form class="alt" method="POST" action="/services/{{ $service->id }}">

		{{ csrf_field() }}
		{{ method_field('PATCH') }}

		<div class="row uniform">

			<div class="12u$">
				<label for="title">Servicio</label>
				<input type="text" name="title" id="title" value="{{ $service->title }}" />
			</div>

			<!-- Break -->
			<div class="12u$">
				<label for="description">Descripción</label>
				<textarea name="description" id="description" rows="6">{{ $service->description }}</textarea>
			</div>

			<!-- Break -->
			<div class="12u$">
				<label for="cost">Precio</label>
				<input type="number" name="cost" id="cost" step="any" value="{{ $service->cost }}" />
			</div>

			<input type="hidden" name="approved" id="approved" value="0" />

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

	<form class="alt" method="POST" action="{{ action('ServiceController@destroy', [$service->id]) }}">

		{{ csrf_field() }}
		{{ method_field('DELETE') }}

		<h3>Acciones</h3>
		<div class="6u 12u$">
			<input type="submit" value="Eliminar" class="special" name="submit" />
		</div>

	</form>

@endsection

