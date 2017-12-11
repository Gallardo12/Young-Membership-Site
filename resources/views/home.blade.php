@extends('layouts.app')

@section('content')

@include('partials.meta-static')

	<div class="container">
		@if (session('status'))
	        <div class="alert alert-success">
	            {{ session('status') }}
	        </div>
	    @endif

	    <h2 class="center">Panel de Usuario</h2>
	    <div class="divider"></div>

	    <p style="margin-top: 2em;" class="flow-text" align="center"><strong>Bienvenido</strong><em> {{ Auth::user()->name }}</em>
	</div>

@endsection
