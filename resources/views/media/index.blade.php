@extends('layouts.app')

@section('title', 'Young Mentorship - Media')

@section('content')

	<h2>Media</h2>

	<div class="table-wrapper">

		<table>

			<thead>

				<tr>
					<th>Imágen</th>
					<th>Acciones</th>
				</tr>

			</thead>

			<tbody>

				@foreach ($photos as $photo)

					<tr>
						<td>
							<img height="50" src="/images/{{ $photo->photo }}" alt="">
						</td>
						<td>
							{{ Form::open(['method' => 'DELETE', 'action' => ['PhotosController@destroy', $photo->id]]) }}
								{!! Form::submit('Borrar imágen', ['class' => 'button']) !!}
							{{ Form::close() }}
						</td>
					</tr>

				@endforeach

			</tbody>

		</table>

	</div>

@endsection

