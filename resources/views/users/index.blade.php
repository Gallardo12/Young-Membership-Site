@extends('layouts.app')

@section('title', 'Young Mentorship - Servicios')

@section('content')

@include('partials.meta-static')

	<div class="container">
		<h2 class="center">Usuarios</h2>
		<div class="divider"></div>
		<div class="row">
			<div class="col s12">
				<table class="centered responsive-table bordered" style="margin-top: 2em;">
			        <thead>
			          	<tr>
			              	<th>Nombre</th>
			              	<th>Email</th>
			              	<th>Fecha Registro</th>
			              	<th>Rol</th>
			          	</tr>
			        </thead>

			        <tbody>
			        	@foreach ($users as $user)
				          	<tr>
				            	<td>{{ $user->name }}</td>
				            	<td>{{ $user->email }}</td>
				            	<td>{{ $user->created_at->diffForHumans() }}</td>
				            	<td>
                                    <div class="container">
                                        {{ Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) }}
                                            {{ Form::select('role_id', ['1' => 'Administrador', '2' => 'Emprendedor', '3' => 'Usuario'], null, ['class' => '']) }}
                                            {{ Form::submit('Aplicar', ['class' => 'waves-effect waves-light btn']) }}
                                        {{ Form::close() }}
                                    </div>
                                </td>
				          	</tr>
			          	@endforeach
			        </tbody>
			    </table>
			</div>
		</div>
	</div>

@endsection