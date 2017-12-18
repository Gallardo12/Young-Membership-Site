@extends('layouts.app')

@section('title', 'Young Mentorship - Servicios')

@section('content')

@include('partials.meta-static')

	<div class="container">
		<h2 class="center">Panel de Usuario</h2>
	    <div class="divider"></div>

	    <p style="margin-top: 2em;" class="flow-text" align="center"><strong>Bienvenido</strong><em> {{ Auth::user()->name }}</em>
	</div>

@endsection