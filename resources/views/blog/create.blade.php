@extends('layouts.app')

@section('title', 'Young Mentorship -- Noticias')

@section('content')

@include('partials.meta-static')

	<div class="container">

		<h2>Nuevo Post</h2>
		<div class="divider"></div>

		<div class="row">
			<form class="alt" method="POST" action="/blog/store">

				{{ csrf_field() }}

				<div class="row">
					<div style="margin-top: 2em;" class="input-field col s12">
						<label for="title">Título</label>
						<input type="text" name="title" id="title" value="" />
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<label for="body">Contenido</label>
						<textarea name="body" class="my-editor" id="body" rows="6"></textarea>
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
	                <div class="input-field col s12 m6">
	                    <input type="submit" value="Guardar" class="waves-effect waves-light btn" />
	                </div>
	            </div>
			</form>
		</div>

	</div>

@endsection

