@extends('layouts.app')

@section('title', 'Young Mentorship - Servicios')

@section('content')

@include('partials.meta-static')

	<div class="container">
		<h2 class="center">Modificar Servicio</h2>
		<div class="divider"></div>

		<div class="row">
			<form class="alt" accept-charset="UTF-8" enctype="multipart/form-data" method="POST" action="/services/{{ $service->id }}">

				{{ csrf_field() }}
				{{ method_field('PATCH') }}

				<div class="row">
					<div style="margin-top: 2em;" class="input-field col s12">
						<i class="material-icons prefix">room_service</i>
						<label for="title">Servicio</label>
						<input type="text" name="title" id="title" value="{{ $service->title }}" />
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<label for="description">Descripción</label>
						<textarea name="description" class="my-editor" id="description" rows="20">{{ $service->description }}</textarea>
					</div>
				</div>

				<div class="row">
					<div class="file-field input-field col s12">
				      	<div class="btn">
				        	<span>Foto</span>
				        	{!! Form::file('photo_id', ['class' => '', 'type' => 'file']) !!}
				      	</div>
				      	<div class="file-path-wrapper">
				      		<input class="file-path validate" type="text">
				      	</div>
				    </div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">location_on</i>
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
						<label for="location">Ubicación</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">view_list</i>
						{!! Form::select("category_id[]", $category, null, ['id' => 'category_id', 'class' => 'teal-text', 'multiple']) !!}
						<label for="category_id">Categoría</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">attach_money</i>
						<label for="cost">$Precio MXN</label>
						<input type="number" name="cost" id="cost" step="any" value="{{ $service->cost }}" />
					</div>
				</div>

				<div class="row">
					<div style="margin-top: 2em;" class="input-field col s12">
						<i class="material-icons prefix">room_service</i>
						<label for="meta_desc">Meta Descripción</label>
						<input type="text" name="meta_desc" id="meta_desc" value="{{ $service->meta_desc }}" />
					</div>
				</div>

				<input type="hidden" name="approved" id="approved" value="0" />

				<div class="row">
	                <div class="input-field col s12 m6">
	                    <input type="submit" value="Guardar" class="waves-effect waves-light btn" />
	                </div>
	            </div>

			</form>

		</div>
		<div class="row">
			<form class="alt" method="POST" action="{{ action('ServiceController@destroy', [$service->id]) }}">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<input type="submit" value="Eliminar" class="waves-effect waves-light btn red" />
			</form>
		</div>

	</div>

@endsection

