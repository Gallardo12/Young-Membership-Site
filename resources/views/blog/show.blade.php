@extends('layouts.app')

@section('title', 'Young Mentorship -- Noticias')

@section('content')

@include('partials.meta-static')

	<div class="container">

		<h2 class="center">{{ $blog->title }}</h2>
		<div class="divider"></div>

		<p style="margin-top: 2em;" class="flow-text" align="center">
			<b>Creado el: {{ $blog->updated_at }}</b>
		</p>
		<p>{!! $blog->body !!}</p>
		<p>
			<a href="{{ action('BlogController@edit', [$blog->id]) }}" class="btn-floating btn-large waves-effect waves-light right"><i class="material-icons">mode_edit</i></a>
		</p>

	</div>

@endsection

