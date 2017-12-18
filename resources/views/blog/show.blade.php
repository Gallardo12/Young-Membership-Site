@extends('layouts.app')

@section('title', 'Young Mentorship -- Noticias')

@section('content')

@include('partials.meta-static')

	<div class="container">

		<h2 class="center">{{ $blog->title }}</h2>
		<div class="divider"></div>

		<p style="margin-top: 2em;" class="flow-text" align="center">
			<b>Creado: </b><em>{{ $blog->updated_at->diffForHumans() }}</em>
		</p>
		<p>{!! $blog->body !!}</p>
		<p><b>Author: </b><a href="#">{{ $blog->user->name }}</a></p>
		@guest

		@else
			@if(Auth::user()->role_id == 1 || Auth::user()->id == $blog->user_id)
				<div class="row">
					<div class="divider"></div>
						<p align="center">
							<a href="{{ action('BlogController@edit', [$blog->id]) }}" class="waves-effect waves-light btn-large">Editar</a>
						</p>
					<div class="divider"></div>
				</div>
			@endif
		@endguest
	</div>

@endsection

