@extends('layouts.app')

@section('content')

	<h2>Panel de Administrador</h2>

    <p>
    	<strong>Bienvenido</strong>
    	<em> {{ Auth::user()->name }}</em>
    </p>


    <ul class="actions">
    	<h3>Noticias</h3>
    	<li>
    		<a href="/blog/create" class="button">Nuevo</a>
    	</li>
    	<li>
    		<a href="/blog/bin" class="button">Papelera</a>
    	</li>
    </ul>

    <ul class="actions">
    	<h3>Servicios</h3>
    	<li>
    		<a href="/services/create" class="button">Nuevo</a>
    	</li>
    	<li>
    		<a href="/services/bin" class="button">Papelera</a>
    	</li>
    </ul>

@endsection
