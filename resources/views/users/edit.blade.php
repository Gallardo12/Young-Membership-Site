@extends('layouts.app')

@section('content')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
@endsection

@include('partials.meta-static')

<div class="container">
    <h2 class="center-align">{{ $user->username }}</h2>
    <div class="divider"></div>

    <div class="row">
    	<div class="col s12 m8">
    		<p class="flow-text textoTeal" align="center">Aquí puedes realizar los cambios a tu perfil!!</p>
    		{!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->username]]) !!}
	    		<div class="row">
	    			<div style="margin-top: 2em;" class="input-field col s10 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
	    				{!! Form::label('username', 'Usuario') !!}
	    				{!! Form::text('username', null, ['class' => '']) !!}
	    				@if ($errors->has('username'))
                        <span>
                            <strong class="red-text">* {{ $errors->first('username') }}</strong>
                        </span>
                    @endif
	    			</div>
	    		</div>
	    		<div class="row">
	    			<div style="margin-top: 2em;" class="input-field col s10 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	    				{!! Form::label('name', 'Nombre') !!}
	    				{!! Form::text('name', null, ['class' => '']) !!}
	    				@if ($errors->has('name'))
                        <span>
                            <strong class="red-text">* {{ $errors->first('name') }}</strong>
                        </span>
                    @endif
	    			</div>
	    		</div>
	    		<div class="row">
	    			<div style="margin-top: 2em;" class="input-field col s10 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	    				{!! Form::label('email', 'Correo Electrónico') !!}
	    				{!! Form::text('email', null, ['class' => '']) !!}
	    			</div>
	    			@if ($errors->has('email'))
                        <span>
                            <strong class="red-text">* {{ $errors->first('email') }}</strong>
                        </span>
                    @endif
	    		</div>
	    		<div class="row">
					<div class="input-field col col s10">
						{!! Form::label('about', 'Acerca de tí') !!}
						{!! Form::textarea('about', null, ['class' => 'materialize-textarea']) !!}
						@if ($errors->has('about'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('about') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
	    		<div class="row">
	    			<div style="margin-top: 2em;" class="input-field col s10 form-group{{ $errors->has('website') ? ' has-error' : '' }}">
	    				{!! Form::label('website', 'Sitio Web') !!}
	    				{!! Form::text('website', null, ['class' => '']) !!}
	    			</div>
	    			@if ($errors->has('website'))
                        <span>
                            <strong class="red-text">* {{ $errors->first('website') }}</strong>
                        </span>
                    @endif
	    		</div>
	    		<div class="row">
	    			<div style="margin-top: 2em;" class="input-field col s10 form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
	    				{!! Form::label('facebook', 'Facebook') !!}
	    				{!! Form::text('facebook', null, ['class' => '']) !!}
	    			</div>
	    			@if ($errors->has('facebook'))
                        <span>
                            <strong class="red-text">* {{ $errors->first('facebook') }}</strong>
                        </span>
                    @endif
	    		</div>
	    		<div class="row">
	    			<div style="margin-top: 2em;" class="input-field col s10 form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
	    				{!! Form::label('twitter', 'Twitter') !!}
	    				{!! Form::text('twitter', null, ['class' => '']) !!}
	    			</div>
	    			@if ($errors->has('twitter'))
                        <span>
                            <strong class="red-text">* {{ $errors->first('twitter') }}</strong>
                        </span>
                    @endif
	    		</div>
	    		<div class="row">
	    			<div class="input-field col s12 m6">
	    				{!! Form::submit('Guardar Cambios', ['class' => 'waves-effect waves-light btn']) !!}
	    			</div>
	    		</div>
	    	{!! Form::close() !!}
    	</div>
	    <div class="col s12 m4">
	    	<h5>hola</h5>
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