@extends('layouts.app')

@section('title', 'Young Mentorship - {{ $user->name }}')

@section('content')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}"/>
@endsection

@include('partials.meta-static')

	<!-- Page Layout here -->
    <div class="row">
      	<div class="col s12 m4 l3 grey">
      		<div class="container">
      			<div class="row">
      				<p align="center">
      					<img class="circle responsive-img" src="{{ asset('images/user.png') }}">
      				</p>
                    <p class="white-text flow-text" align="center"><b>{{ $user->name }}</b></p>
                    <p class="white-text" align="center"><b>{{ $user->username }}</b></p>
                    <p class="white-text" align="center"><b>{{ $user->role->name }}</b></p>
                    <p class="white-text" align="center"><b>Usuario desde </b>{{ $user->created_at->diffForHumans() }}</p>
      			</div>
      		</div>
      	</div>

      	<div class="col s12 m8 l9">
            <h2 class="center">Servicios</h2>
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
                                        <span class="card-title activator grey-text text-darken-4">{{ $service->title }}<i class="material-icons right">more_vert</i></span>
                                        <br>
                                        <p align="center">
                                            <a class="btn" href="{{ action('ServiceController@show', [$service->slug]) }}">Más</a>
                                        </p>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">{{ $service->title }}<i class="material-icons right">close</i></span>
                                        <p><i class="material-icons">account_circle</i><b>Emprendedor: </b><a href="{{ route('users.show', $user->username) }}">{{ $service->user->name }}</a></p>
                                        <p><i class="material-icons">monetization_on</i><b>Costo: </b>${{ money_format('%.2n', $service->cost) }} MXN</p>
                                        <p><i class="material-icons">location_on</i><b>Ubicación: </b>{{ $service->location }}</p>
                                        <p><i class="material-icons">date_range</i><b>Creado: </b>{{ $service->updated_at->diffForHumans() }}</p>
                                        <p>
                                            <em>
                                                @foreach ($service->category as $category)
                                                    <a href="{{ action('CategoryController@show', [$category->slug]) }}">|{{ $category->name }}|</a>
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
      	</div>
    </div>

@endsection