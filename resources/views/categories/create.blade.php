@extends('layouts.app')

@section('title', 'Young Mentorship - Categorías')

@section('content')

	<h2>Nueva Categoría</h2>

	<form class="alt" method="POST" action="/categories/store">

		{{ csrf_field() }}

		<div class="row uniform">

			<div class="12u$">
				<label for="name">Nombre</label>
				<input type="text" name="name" id="name" value="" />
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

