@extends('layouts.app')

@section('title', 'Young Mentorship - Categorías')

@section('content')

@include('partials.meta-static')

	<div class="container">
		<h2>Categorías</h2>

		<div class="table-wrapper">

			<table>

				<thead>

					<tr>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>

				</thead>

				<tbody>

					@foreach ($categories as $category)

						<tr>
							<td><a href="{{ action('CategoryController@show', [$category->slug]) }}">{{ $category->name }}</a></td>
							<td>
								<a href="{{ action('CategoryController@edit', [$category->id]) }}" class="button">Editar</a>
							</td>
						</tr>

					@endforeach

				</tbody>

			</table>

		</div>
	</div>

@endsection

