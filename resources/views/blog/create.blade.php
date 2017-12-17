@extends('layouts.app')

@section('title', 'Young Mentorship -- Noticias')

@section('content')

@include('partials.meta-static')

	<div class="container">

		<h2>Nuevo Post</h2>
		<div class="divider"></div>

		<div class="row">
			{!! Form::open(['method' => 'POST', 'action' => 'BlogController@store', 'files' => 'true', 'class' => 'alt']) !!}

				<div class="row">
					<div style="margin-top: 2em;" class="input-field col s12">
						<label for="title">Título</label>
						<input type="text" name="title" id="title" value="" />
						@if ($errors->has('title'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('title') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<label for="body">Contenido</label>
						<textarea name="body" class="my-editor" id="body" rows="6"></textarea>
						@if ($errors->has('body'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('body') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>

				<div class="row">
					<div class="file-field input-field col s12">
				      	<div class="btn">
				        	<span>Imagen</span>
				        	{!! Form::file('photob_id', ['class' => '', 'type' => 'file']) !!}
				      	</div>
				      	<div class="file-path-wrapper">
				      		<input class="file-path validate" type="text">
				      	</div>
				      	@if ($errors->has('photob_id'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('photob_id') }}</strong>
	                        </span>
	                    @endif
				    </div>
				</div>

				<div class="row">
	                <div class="input-field col s12 m6">
	                    <input type="submit" value="Guardar" class="waves-effect waves-light btn" />
	                </div>
	            </div>
			{!! Form::close() !!}
		</div>

	</div>

@endsection

