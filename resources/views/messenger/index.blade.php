@extends('layouts.app')

@section('content')
    @include('messenger.partials.flash')
	@if(Auth::user()->role_id == 1)
		@each('messenger.partials.thread', $threads1, 'thread', 'messenger.partials.no-threads')
	@else
    	@each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
    @endif
@stop
