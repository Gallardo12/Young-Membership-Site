@extends('layouts.app')

@section('title', 'Young Mentorship - {{ $user->name }}')

@section('content')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}"/>
@endsection

@include('partials.meta-static')

	<!-- Page Layout here -->
    <div class="row">

      	<div class="col s12 m4 l3 grey"> <!-- Note that "m4 l3" was added -->
      		<div class="container">
      			<div class="row">
      				<p align="center">
      					<img class="circle responsive-img" src="{{ asset('images/user.png') }}">
      				</p>

      			</div>
      		</div>
      	</div>

      	<div class="col s12 m8 l9"> <!-- Note that "m8 l9" was added -->


      	</div>

    </div>

@endsection