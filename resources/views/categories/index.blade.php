@extends('layouts.app')

@section('title', 'Young Mentorship - Categorías')

@section('content')

@include('partials.meta-static')

	<div class="container">
		<h2 class="center">Categorías</h2>
		<div class="divider"></div>

		<div style="margin-top: 2em;" class="table-wrapper">

			<table>

				<thead>

					<tr>
						<th class="center flow-text">Nombre</th>
						<th class="center flow-text">Acciones</th>
					</tr>

				</thead>

				<tbody>

					@foreach ($categories as $category)

						<tr>
							<td class="center"><a class="flow-text" href="{{ action('CategoryController@show', [$category->slug]) }}">{{ $category->name }}</a></td>
							<td class="center">
								<a href="{{ action('CategoryController@edit', [$category->id]) }}" class="waves-effect waves-light btn">Editar</a>
							</td>
						</tr>

					@endforeach

				</tbody>

			</table>

		</div>
	</div>

@endsection

