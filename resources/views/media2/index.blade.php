@extends('layouts.app')

@section('title', 'Young Mentorship - Media')

@section('content')

@include('partials.meta-static')

	<div class="container">
		<h2 class="center">Media</h2>
		<div class="divider"></div>
		<div class="row">
			<div style="margin-top: 2em;" class="table-wrapper">
				<table>
					<thead>
						<tr>
							<th class="center">Imágen</th>
							<th class="center">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($photos as $photo)
							<tr>
								<td class="center">
									<img height="50" src="/images/{{ $photo->photob }}" alt="">
								</td>
								<td class="center">
									{{ Form::open(['method' => 'DELETE', 'action' => ['PhotobsController@destroy', $photo->id]]) }}
										{!! Form::submit('Borrar imágen', ['class' => 'flow-text btn red']) !!}
									{{ Form::close() }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection

