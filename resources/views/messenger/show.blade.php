@extends('layouts.app')

@section('title', 'Young Mentorship - Mensajes')

@section('content')

@include('partials.meta-static')

	<div class="container">
		<div class="row">
			<div class="col s12">
				<h3 class="center">{{ $thread->subject }}</h3>
		        @each('messenger.partials.messages', $thread->messages, 'message')

		        @include('messenger.partials.form-message')
			</div>
		</div>
	</div>

@stop
