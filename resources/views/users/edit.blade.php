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
    		<p class="flow-text textoAmber" align="center">Aquí puedes realizar los cambios a tu perfil!!</p>
    		{!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->username], 'files' => true]) !!}
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
					<div class="file-field input-field col s10">
				      	<div class="btn black">
				        	<span>Foto de Perfil</span>
				        	{!! Form::file('photo_id', ['class' => '', 'type' => 'file']) !!}
				      	</div>
				      	<div class="file-path-wrapper">
				      		<input class="file-path validate" type="text">
				      	</div>
				      	@if ($errors->has('photo_id'))
	                        <span>
	                            <strong class="red-text">* {{ $errors->first('photo_id') }}</strong>
	                        </span>
	                    @endif
				    </div>
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
	    			<p>Deseas recibir notificaciones vía Correo Electrónico?</p>
    				<div class="switch">
    					<label>
    						No
    						{{ Form::checkbox('get_email', 1, null, ['class' => 'textoAmber']) }}
    						<span class="lever"></span>
    						Si
    					</label>
    				</div>
	    		</div>
	    		<div class="row">
	    			<div class="input-field col s12 m6">
	    				{!! Form::submit('Guardar Cambios', ['class' => 'waves-effect waves-light btn black']) !!}
	    			</div>
	    		</div>
	    	{!! Form::close() !!}
    	</div>
	    <div class="col s12 m4">
	    	<p align="center">
	    		@if (Auth::user()->photo)
	                <img class="responsive-img circle" width="200" src="/images/{{ Auth::user()->photo ? Auth::user()->photo->photo : '' }}" alt="{{ str_limit(Auth::user()->name, 50) }}" />
	            @else
	                <img class="responsive-img circle" src="{{ asset('images/user.png') }}">
	            @endif
	            <p align="center" class="flow-text">
	            	{{ Auth::user()->username }}
	            </p>
	            <p class="textoAmber flow-text" align="center">
                    <b>{{ $user->name }}</b>
                </p>
                <p class="textoAmber" align="center">
                    <b>{{ $user->username }}</b>
                </p>
                <p class="textoAmber" align="center">
                    <b>{{ $user->role->name }}</b>
                </p>
                <div class="divider"></div>
                <p>
                    @if($user->about)
                        <h4 class="grey-text text-darken-4 center">Acerca de mi</h4>
                        <p class="grey-text text-darken-4" align="center"><em>{{ $user->about }}</em></p>
                    @endif
                </p>
                <div class="divider"></div>
                <p>
                    @if($user->website)
                        <p class="grey-text text-darken-4 flow-text" align="center"><i class="fa fa-globe textoAmber" aria-hidden="true"></i><em>   <a class="black-text" href="{{ $user->website }}" target="_blank">{{ $user->website }}</a></em></p>
                    @endif
                </p>
                <p>
                    @if($user->facebook)
                        <p class="grey-text text-darken-4 flow-text" align="center"><i class="fa fa-facebook textoAmber" aria-hidden="true"></i><em>    <a class="black-text" href="https://www.facebook.com/{{ $user->facebook }}" target="_blank">{{ $user->facebook }}</a></em></p>
                    @endif
                </p>
                <p>
                    @if($user->twitter)
                        <p class="grey-text text-darken-4 flow-text" align="center"><i class="fa fa-twitter textoAmber" aria-hidden="true"></i><em>    <a class="black-text" href="https://twitter.com/{{ $user->twitter }}" target="_blank">{{ $user->twitter }}</a></em></p>
                    @endif
                </p>
                <div class="divider"></div>
                <p class="grey-text text-darken-4" align="center">
                    <b><span class="textoAmber">Usuario desde </span></b>{{ $user->created_at->diffForHumans() }}
                    <span class="new badge amber accent-2" data-badge-caption="Servicios">
                        {{ $user->service->count() }}
                    </span>
                </p>
	    	</p>
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