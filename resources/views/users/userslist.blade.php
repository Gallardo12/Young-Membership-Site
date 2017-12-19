@extends('layouts.app')

@section('title', 'Young Mentorship - Usuarios')

@section('content')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}"/>
@endsection

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
				            	<td><a href="{{ route('users.show', $user->name) }}">{{ $user->name }}</a></td>
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