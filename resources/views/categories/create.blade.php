@extends('layouts.app')

@section('title', 'Young Mentorship - Categorías')

@section('content')

@include('partials.meta-static')

	<div class="container">

		<h2 class="center">Nueva Categoría</h2>
		<div class="divider"></div>

		<div class="row">
			<div class="col s12 m8">
				<form class="alt" method="POST" action="/categories/store">

					{{ csrf_field() }}

					<div class="row">
						<div style="margin-top: 2em;" class="input-field col s12">
							<i class="material-icons prefix">featured_play_list</i>
							<label for="name">Nombre</label>
							<input type="text" name="name" id="name" value="" />
							@if ($errors->has('name'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('name') }}</strong>
	                        </span>
	                    @endif
						</div>
					</div>

					<div class="row">
		                <div class="input-field col s12 m6">
		                    <input type="submit" value="Guardar" class="waves-effect waves-light btn" />
		                </div>
		            </div>

				</form>
			</div>
			<div class="col s12 m4">
				<div class="container">
					<h5 class="center">Existentes</h5>
					<div class="divider"></div>
					<ul style="list-style-type: none;" class="center">
						@foreach($categories as $category)
							<li class="flow-text"><a class="flow-text" href="{{ action('CategoryController@show', [$category->slug]) }}">{{ $category->name }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>

@endsection

