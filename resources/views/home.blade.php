@extends('layouts.app')

@section('content')

@include('partials.meta-static')

	<div class="container">
		@if (session('status'))
	        <div class="alert alert-success">
	            {{ session('status') }}
	        </div>
	    @endif

	    <h2>Panel de Usuario</h2>

	    <p><strong>Bienvenido</strong><em> {{ Auth::user()->name }}</em>
	</div>

@endsection
