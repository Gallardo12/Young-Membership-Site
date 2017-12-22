@extends('layouts.app')

@section('title', 'Young Mentorship - Categorías')

@section('content')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}"/>
@endsection

@include('partials.meta-static')

	<div class="container">
		<h2 class="center">Categorías</h2>
		<div class="divider"></div>

		<div style="margin-top: 2em;" class="row">

			<table>

				<thead>

					<tr>
						<th class="center flow-text">Nombre</th>
						<th class="center flow-text">Acciones</th>
					</tr>

				</thead>

				<tbody class="centered responsive-table">

					@foreach ($categories as $category)

						<tr>
							<td class="center"><a class="flow-text" href="{{ action('CategoryController@show', [$category->slug]) }}">{{ $category->name }}</a></td>
							<td class="center" style="display: inline-flex;">
								<a href="{{ action('CategoryController@edit', [$category->id]) }}" class="btn-floating btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar Categoría"><i class="material-icons">mode_edit</i></a>
								{!! Form::open(['method' => 'DELETE', 'action' => ['CategoryController@destroy', $category->id]]) !!}
                                    <button class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Eliminar Categoría" type="submit" name="action">
                                        <i class="material-icons">delete</i>
                                    </button>
                                {!! Form::close() !!}
							</td>
						</tr>

					@endforeach

				</tbody>

			</table>

		</div>
	</div>

	<script src="{{asset('/js/sweetalert2.js') }}" type="text/javascript" charset="utf-8"></script>
    @if (notify()->ready())
        <script>
            swal({
                title: "{!! notify()->message() !!}",
                text: "{!! notify()->option('text') !!}",
                type: "{{ notify()->type() }}",
                @if (notify()->option('timer'))
                    timer: {{ notify()->option('timer') }},
                    showConfirmButton: false
                @endif
            });
        </script>
    @endif

@endsection

