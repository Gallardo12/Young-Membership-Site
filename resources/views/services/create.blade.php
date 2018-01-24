@extends('layouts.app')

@section('title', 'Young Mentorship - Servicios')

@section('content')

@include('partials.meta-static')

	<div class="container">

		<h2 class="center">Nuevo Servicio</h2>
		<div class="divider"></div>

		<div class="row">
			{!! Form::open(['method' => 'POST', 'action' => 'ServiceController@store', 'files' => 'true', 'class' => 'alt']) !!}

				<div class="row">
					<div style="margin-top: 2em;" class="input-field col s12">
						<i class="material-icons prefix">room_service</i>
						<label for="title">Servicio</label>
						<input type="text" name="title" id="title" />
						@if ($errors->has('title'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('title') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<label for="description">Descripción</label>
						<textarea name="description" class="my-editor" id="description" rows="20"></textarea>
						@if ($errors->has('description'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('description') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>

				<div class="row">
					<div class="file-field input-field col s12">
				      	<div class="btn black">
				        	<span>Foto</span>
				        	{!! Form::file('photo_id', ['class' => '', 'type' => 'file']) !!}
				      	</div>
				      	<div class="file-path-wrapper">
				      		<input class="file-path validate" type="text">
				      	</div>
				      	@if ($errors->has('photo_id'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('photo_id') }}</strong>
	                        </span>
	                    @endif
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
						@if ($errors->has('location'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('location') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">view_list</i>
						{!! Form::select("category_id[]", $category, null, ['id' => 'category_id', 'class' => 'teal-text', 'multiple']) !!}
						<label for="category_id">Categoría</label>
						@if ($errors->has('category_id'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('category_id') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">attach_money</i>
						<label for="cost">$Precio MXN</label>
						<input type="number" name="cost" id="cost" step="any" />
						@if ($errors->has('cost'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('cost') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>

				<div class="row">
					<div style="margin-top: 2em;" class="input-field col s12">
						<i class="material-icons prefix">room_service</i>
						<label for="meta_desc">Meta Descripción</label>
						<input type="text" name="meta_desc" id="meta_desc" />
						@if ($errors->has('meta_desc'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('meta_desc') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>

				<div class="row">
	                <div class="input-field col s12 center">
	                    <input type="submit" value="Enviar para autorización" class="waves-effect waves-light btn black" />
	                </div>
	            </div>

			{!! Form::close() !!}

		</div>

	</div>

@endsection