@extends('layouts.app')

@section('title', 'Young Mentorship - Servicios')

@section('content')

	<h2>Nuevo Servicio</h2>

	{!! Form::open(['method' => 'POST', 'action' => 'ServiceController@store', 'files' => 'true', 'class' => 'alt']) !!}

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

			<div class="12u$">
				{!! Form::label('photo_id', 'Imágen Principal') !!}
				{!! Form::file('photo_id', ['class' => '']) !!}
			</div>

			<div class="12u$">
				<label for="location">Ubicación</label>
				<select name="location" id="location">
					<option value="Aguascalientes">Aguascalientes</option>
					<option value="Baja California">Baja California</option>
					<option value="Baja California Sur">Baja California Sur</option>
					<option value="Campeche">Campeche</option>
					<option value="Ciudad de México">Ciudad de México</option>
					<option value="Coahuila">Coahuila</option>
					<option value="Colima">Colima</option>
					<option value="Chiapas">Chiapas</option>
					<option value="Chihuahua">Chihuahua</option>
					<option value="Durango" selected>Durango</option>
					<option value="Guanajuato">Guanajuato</option>
					<option value="Guerrero">Guerrero</option>
					<option value="Hidalgo">Hidalgo</option>
					<option value="Jalisco">Jalisco</option>
					<option value="Estado de México">Estado de México</option>
					<option value="Michoacán">Michoacán</option>
					<option value="Morelos">Morelos</option>
					<option value="Nayarit">Nayarit</option>
					<option value="Nuevo León">Nuevo León</option>
					<option value="Oaxaca">Oaxaca</option>
					<option value="Puebla">Puebla</option>
					<option value="Querétaro">Querétaro</option>
					<option value="Quintana Roo">Quintana Roo</option>
					<option value="San Luis Potosí">San Luis Potosí</option>
					<option value="Sinaloa">Sinaloa</option>
					<option value="Sonora">Sonora</option>
					<option value="Tabasco">Tabasco</option>
					<option value="Tamaulipas">Tamaulipas</option>
					<option value="Tlaxcala">Tlaxcala</option>
					<option value="Veracruz">Veracruz</option>
					<option value="Yucatán">Yucatán</option>
					<option value="Zacatecas">Zacatecas</option>
				</select>
			</div>

			<!-- Break -->
			<div class="12u$">
				<label for="cost">Precio</label>
				<input type="number" name="cost" id="cost" step="any" />
			</div>

			<div class="12u$">
				<label for="category_id">Categoría</label>
				{!! Form::select("category_id[]", $category, null, ['id' => 'tag_list', 'class' => '', 'multiple']) !!}
			</div>

			<div class="12u$">
				<label for="meta_desc">Meta Descripción</label>
				<input type="text" name="meta_desc" id="meta_desc" value="" />
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

	{!! Form::close() !!}

@endsection

