@extends('layouts.app')

@section('title', 'Young Mentorship - Usuario')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
@endsection

@section('content')



@include('partials.meta-static')

	<div class="container">
		<h2 class="center">Panel de Usuario</h2>
	    <div class="divider"></div>
	    <div class="row">
	    	<div class="col s12 m5">
		    	<p align="center">
			    	@if (Auth::user()->photo)
		                <img class="responsive-img circle" width="200" src="/images/{{ Auth::user()->photo ? Auth::user()->photo->photo : '' }}" alt="{{ str_limit(Auth::user()->name, 50) }}" />
		            @else
		                <img class="responsive-img circle" src="{{ asset('images/user.png') }}">
		            @endif
		            <p align="center" class="flow-text">
		            	{{ Auth::user()->username }}
		            </p>
			    </p>
		    </div>
		    <div class="col s12 m7">
		    	<p style="margin-top: 2em;" class="flow-text" align="center">
			    	<strong>Bienvenido</strong> {{ Auth::user()->name }}
			    </p>
			    <div class="divider"></div>
			    <p align="center">
			    	<em>{{ Auth::user()->role->name }}</em>
			    </p>
			    <div class="divider"></div>
			    <p align="center">
			    	<a class="waves-effect waves-light btn black" href="{{ action('UserController@edit', [Auth::user()->username]) }}">Editar</a>
			    	<a class="waves-effect waves-light btn black" href="{{ route('users.show', Auth::user()->username) }}">Perfil Público</a>
			    </p>
		    </div>
	    </div>

	    <div class="row">
    		<div class="col s12">
      			<ul class="tabs tabs-fixed-width">
			        <li class="tab col s3"><a class="active" href="#test1">Servicios</a></li>
			        <li class="tab col s3"><a href="#test2">Noticias</a></li>
			        <li class="tab col s3"><a href="#test3">Mensajes @include('messenger.unread-count')</a></li>
      			</ul>
    		</div>
		    <div id="test1" class="col s12">
		    	<div class="row">
		    		@if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
			    		@foreach ($service as $service)
				    		@if ($service->user_id == Auth::user()->id)
				                <div class="col s12 m6">
				                    <div class="card medium">
				                        <div class="card-image waves-effect waves-block waves-light">
				                            @if ($service->photo)
				                                <img class="activator" src="/images/{{ $service->photo ? $service->photo->photo : '' }}" alt="{{ str_limit($service->title, 50) }}" />
				                            @else
				                                <img class="activator" src="{{ asset('images/bg.jpg') }}">
				                            @endif
				                        </div>
				                        <div class="card-content">
				                            <span class="card-title activator grey-text text-darken-4">{{ $service->title }}<i class="material-icons right">more_vert</i></span>
				                            <br>
				                            <p align="center">
				                            	<a class="btn" href="{{ action('ServiceController@show', [$service->slug]) }}">Más</a>
				                            	<span class="new badge" data-badge-caption="@if ($service->status == 0)Borrador @else Publicado @endif"></span>
				                            </p>
				                        </div>
				                        <div class="card-reveal">
				                            <span class="card-title grey-text text-darken-4">{{ $service->title }}<i class="material-icons textoTeal right">close</i></span>
				                            <p><i class="material-icons textoTeal">account_circle</i><b>Emprendedor: </b><a class="textoTeal" href="#">{{ $service->user->name }}</a></p>
				                            <p><i class="material-icons textoTeal">monetization_on</i><b>Costo: </b>${{ money_format('%.2n', $service->cost) }} MXN</p>
				                            <p><i class="material-icons textoTeal">location_on</i><b>Ubicación: </b>{{ $service->location }}</p>
				                            <p><i class="material-icons textoTeal">date_range</i><b>Creado: </b>{{ $service->updated_at->diffForHumans() }}</p>
				                            <p>
				                                <em>
				                                    @foreach ($service->category as $category)
				                                        <a class="textoTeal" href="{{ action('CategoryController@show', [$category->slug]) }}">|{{ $category->name }}|</a>
				                                    @endforeach
				                                </em>
				                            </p>
				                        </div>
				                    </div>
			                	</div>
			               	@endif
			            @endforeach
			        @else
			        	<p class="flow-text" align="center">Debes ser parte de Young<span class="textoTeal">México</span> para publicar tus servicios.</p>
			        	<p align="center">
			        		<a href="/contact" class="btn">Se parte de YoungMéxico</a>
			        	</p>
			        @endif
		    	</div>
		    	@if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
		            <div class="row">
						<div class="divider"></div>
							<p align="center">
								<a href="/services/create" class="waves-effect waves-light btn-large">Nuevo Servicio</a>
							</p>
						<div class="divider"></div>
					</div>
				@endif
		    </div>
		    <div id="test2" class="col s12">
		    	<div class="row">
		    		@if (Auth::user()->role_id == 1)
			    		@foreach ($blog as $blog)
				    		@if ($blog->user_id == Auth::user()->id)
				                <div class="col s12 m6">
				                    <div class="card medium">
				                        <div class="card-image waves-effect waves-block waves-light">
				                            @if ($blog->photob)
				                                <img class="activator" data-caption="{{ $blog->title }}" src="/images/{{ $blog->photob ? $blog->photob->photob : '' }}" alt="{{ str_limit($blog->title, 50) }}" />
				                            @else
				                                <img class="activator" src="{{ asset('images/bg.jpg') }}">
				                            @endif
				                        </div>
				                        <div class="card-content">
				                            <span class="card-title activator grey-text text-darken-4">{{ $blog->title }}<i class="material-icons right">more_vert</i></span>
				                            <br>
				                            <p align="center"><a class="btn" href="{{ action('BlogController@show', [$blog->id]) }}">Leer</a></p>
				                        </div>
				                        <div class="card-reveal">
				                            <span class="card-title grey-text text-darken-4">{{ $blog->title }}<i class="material-icons right">close</i></span>
				                            <p><b>Creado: </b>{{ $blog->updated_at->diffForHumans() }}</p>
				                            <p>{!! str_limit($blog->body, 500) !!}</p>
				                        </div>
				                    </div>
				                </div>
				            @endif
			            @endforeach
			        @else
			        	<p class="flow-text" align="center">Debes ser parte del equipo de Young<span class="textoTeal">México</span> para publicar noticias.</p>
			        	<p align="center">
			        		<a href="/contact" class="btn">Se parte del equipo de YoungMéxico</a>
			        	</p>
			        @endif
		    	</div>
		    	@if (Auth::user()->role_id == 1)
		            <div class="row">
						<div class="divider"></div>
							<p align="center">
								<a href="/blog/create" class="waves-effect waves-light btn-large">Nueva Noticia</a>
							</p>
						<div class="divider"></div>
					</div>
				@endif
		    </div>
		    <div id="test3" class="col s12">
		    	<div class="row"></div>
		    	<div class="divider"></div>
		    	<p align="center">
		    		<a href="/messages" class="waves-effect waves-light btn-large">Ver Mensajes</a>
			    	@if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
			    		<a href="/messages/create" class="waves-effect waves-light btn-large">Nuevo Mensaje</a>
			    	@endif
		    	</p>
		    	<div class="divider"></div>
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