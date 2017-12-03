@extends('layouts.app')

@section('title', 'Young Mentorship - Servicios')

@section('content')

	<h2>Nuevo Servicio</h2>

	<form class="alt" method="POST" action="/services/store">

		{{ csrf_field() }}

		<div class="row uniform">

			<div class="12u$">
				<label for="title">Servicio</label>
				<input type="text" name="title" id="title" value="" />
			</div>

			<!-- Break -->
			<div class="12u$">
				<label for="description">Descripción</label>
				<textarea name="description" id="description" rows="6"></textarea>
			</div>

			<!-- Break -->
			<div class="12u$">
				<label for="cost">Precio</label>
				<input type="number" name="cost" id="cost" step="any" />
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

@endsection

