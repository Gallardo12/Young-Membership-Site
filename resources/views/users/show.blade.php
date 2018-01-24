@extends('layouts.app')

@section('title', 'Young Mentorship - {{ $user->name }}')

@section('content')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
@endsection

@include('partials.meta-static')

	<!-- Page Layout here -->
    <div class="row">
      	<div style="height: 100%; margin: 0px; padding: 0px;" class="col s12 m5 l4 grey white-text">
      		<div class="container">
      			<div class="row">
      				<p align="center">
      					@if ($user->photo)
                            <img class="responsive-img circle" height="200" width="200" src="/images/{{ $user->photo ? $user->photo->photo : '' }}" alt="{{ str_limit($user->name, 50) }}" />
                        @else
                            <img class="responsive-img" src="{{ asset('images/user.png') }}">
                        @endif
      				</p>
                    <p class="flow-text" align="center">
                        <b class="textoAmber">Nombre: </b><em>{{ $user->name }}</em>
                    </p>
                    <p class="flow-text" align="center">
                        <b class="textoAmber">Usuario: </b><em>{{ $user->username }}</em>
                    </p>
                    <p class="flow-text" align="center">
                        <b class="textoAmber">Rol: </b><em>{{ $user->role->name }}</em>
                    </p>
                    <div class="divider"></div>
                    <p>
                        @if($user->about)
                            <h4 class="white-text center">Acerca de mi</h4>
                            <p class="white-text" align="center"><em>{{ $user->about }}</em></p>
                        @endif
                    </p>
                    <div class="divider"></div>
                    <p>
                        @if($user->website)
                            <p class="white-text flow-text" align="center"><i class="fa fa-globe textoAmber" aria-hidden="true"></i><em>   <a class="white-text" href="{{ $user->website }}" target="_blank">{{ $user->website }}</a></em></p>
                        @endif
                    </p>
                    <p>
                        @if($user->facebook)
                            <p class="white-text flow-text" align="center"><i class="fa fa-facebook textoAmber" aria-hidden="true"></i><em>    <a class="white-text" href="https://www.facebook.com/{{ $user->facebook }}" target="_blank">{{ $user->facebook }}</a></em></p>
                        @endif
                    </p>
                    <p>
                        @if($user->twitter)
                            <p class="white-text flow-text" align="center"><i class="fa fa-twitter textoAmber" aria-hidden="true"></i><em>    <a class="white-text" href="https://twitter.com/{{ $user->twitter }}" target="_blank">{{ $user->twitter }}</a></em></p>
                        @endif
                    </p>
                    <div class="divider"></div>
                    <p class="white-text" align="center">
                        <b><span class="textoAmber">Usuario desde </span></b>{{ $user->created_at->diffForHumans() }}
                    </p>
      			</div>
      		</div>
      	</div>

      	<div class="col s12 m7 l8">
            <h2 class="center">Servicios</h2>
            @if($user->service->count() > 0)
                <div class="row">
                    @foreach ($service as $service)
                        @if ($service->user_id == $user->id)
                            @if ($service->status == 1)
                                <div class="col s12 m6 l4">
                                    <div class="card medium">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            @if ($service->photo)
                                                <img class="activator" src="/images/{{ $service->photo ? $service->photo->photo : '' }}" alt="{{ str_limit($service->title, 50) }}" />
                                            @else
                                                <img class="activator" src="{{ asset('images/bg.jpg') }}">
                                            @endif
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title activator grey-text text-darken-4">{{ $service->title }}<i class="material-icons textoAmber right">more_vert</i></span>
                                            <br>
                                            <p align="center">
                                                <a class="btn black" href="{{ action('ServiceController@show', [$service->slug]) }}">Más</a>
                                            </p>
                                        </div>
                                        <div class="card-reveal">
                                            <span class="card-title grey-text text-darken-4">{{ $service->title }}<i class="material-icons textoAmber right">close</i></span>
                                            <p><i class="material-icons textoAmber">account_circle</i><b>Emprendedor: </b><a class="textoAmber" href="{{ route('users.show', $user->username) }}">{{ $service->user->name }}</a></p>
                                            <p><i class="material-icons textoAmber">monetization_on</i><b>Costo: </b>${{ money_format('%.2n', $service->cost) }} MXN</p>
                                            <p><i class="material-icons textoAmber">location_on</i><b>Ubicación: </b>{{ $service->location }}</p>
                                            <p><input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $service->averageRating }}" data-size="xs" disabled=""></p>
                                            <p><i class="material-icons textoAmber">date_range</i><b>Creado: </b>{{ $service->updated_at->diffForHumans() }}</p>
                                            <p align="center">
                                                <em>
                                                    @foreach ($service->category as $category)
                                                        <a class="textoAmber" href="{{ action('CategoryController@show', [$category->slug]) }}">|{{ $category->name }}|</a>
                                                    @endforeach
                                                </em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            @else
                @if($user->role->name == 'Administrador' || $user->role->name == 'Emprendedor')
                    <p class="flow-text" align="center">{{ $user->username }} no tiene servicios publicados aún...</p>
                @else
                    <p class="flow-text" align="center">Debes ser parte de Young<span class="textoAmber">México</span> para publicar tus servicios.</p>
                    <p align="center">
                        <a href="/contact" class="btn black">Se parte de YoungMéxico</a>
                    </p>
                @endif
            @endif
            <div class="divider"></div>
            <h2 class="center">Noticias</h2>
            @if($user->blog->count() > 0)
                <div class="row">
                    @foreach ($blog as $blog)
                        @if ($blog->user_id == $user->id)
                            <div class="col s12 m6 l4">
                                <div class="card medium">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        @if ($blog->photob)
                                            <img class="activator" data-caption="{{ $blog->title }}" src="/images/{{ $blog->photob ? $blog->photob->photob : '' }}" alt="{{ str_limit($blog->title, 50) }}" />
                                        @else
                                            <img class="activator" src="{{ asset('images/bg.jpg') }}">
                                        @endif
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4">{{ $blog->title }}<i class="material-icons textoAmber right">more_vert</i></span>
                                        <br>
                                        <p align="center"><a class="btn black" href="{{ action('BlogController@show', [$blog->id]) }}">Leer</a></p>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">{{ $blog->title }}<i class="material-icons textoAmber right">close</i></span>
                                        <p><b>Creado: </b>{{ $blog->updated_at->diffForHumans() }} por <a class="textoAmber" href="{{ route('users.show', $blog->user->username) }}">{{ $blog->user->name }}</a></p>
                                        <p>{!! str_limit($blog->body, 500) !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                @if($user->role->name == 'Administrador' || $user->role->name == 'Emprendedor')
                    <p class="flow-text" align="center">{{ $user->username }} no tiene noticias publicadas aún...</p>
                @else
                    <p class="flow-text" align="center">Debes ser parte de Young<span class="textoAmber">México</span> para publicar tus servicios.</p>
                    <p align="center">
                        <a href="/contact" class="btn black">Se parte de YoungMéxico</a>
                    </p>
                @endif
            @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script type="text/javascript" src="{{asset('/js/sweetalert2.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/rateable.js') }}"></script>
    <script type="text/javascript">
        $("#input-id").rating();
    </script>

@endsection