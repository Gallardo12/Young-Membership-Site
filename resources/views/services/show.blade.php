@extends('layouts.app')

@section('content')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
@endsection

@include('partials.meta-dynamic')

	<div class="container">
		<br>
		<div class="divider"></div>
		<h2 class="center">{{ $service->title }}</h2>
		<p class="flow-text" align="center">
			@foreach ($service->category as $category)
				<a class="textoAmber" href="{{ action('CategoryController@show', [$category->slug]) }}">|{{ $category->name }}|</a>
			@endforeach
		</p>
		<div class="divider"></div>
		<div class="row">
			<div class="col s12 m5">
				<p align="center">
					@if ($service->photo)
						<img class="materialboxed responsive-img" src="/images/{{ $service->photo ? $service->photo->photo : '' }}" alt="{{ str_limit($service->title, 50) }}" />
					@endif
				</p>
			</div>
			<div class="col s12 m7">
				<p class="flow-text">
					<i class="material-icons textoAmber">account_circle</i>
					<b>Emprendedor: </b><a class="textoAmber" href="{{ route('users.show', $service->user->username) }}">{{ $service->user->name }}</a>
				</p>
				<p class="flow-text">
					<i class="material-icons textoAmber">monetization_on</i>
					<b>Costo: </b>${{ money_format('%.2n', $service->cost) }} MXN
				</p>
				<p class="flow-text">
					<i class="material-icons textoAmber">location_on</i>
					<b>Ubicación: </b>{{ $service->location }}
				</p>
				@guest
					<input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $service->averageRating }}" data-size="xs" disabled="">
				@else
					<p class="flow-text">
						<form action="{{ route('services.post') }}" method="POST">
					        {{ csrf_field() }}
					        {{ method_field('PATCH') }}
					        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $service->userAverageRating }}" data-size="xs">
					        <input type="hidden" name="id" required="" value="{{ $service->id }}">
					        <button type="submit" class="waves-effect waves-light btn black">Calificar</button>
					    </form>
					</p>
				@endguest
			</div>
		</div>
		<div class="row">
			<div class="divider"></div>
			<h4 class="center"><i class="material-icons textoAmber">description</i>Descripción</h4>
			<p class="">{!! $service->description !!}</p>
			<div class="divider"></div>
			<p class="center flow-text">
				<i class="material-icons textoAmber">date_range</i>
				<b>Publicado: </b><em>{{ $service->updated_at->diffForHumans() }}</em>
			</p>
		</div>
		@guest

		@else
			@if(Auth::user()->role_id == 1 || Auth::user()->id == $service->user_id)
				<div class="row">
					<div class="divider"></div>
						<p align="center">
							<a href="{{ action('ServiceController@edit', [$service->id]) }}" class="waves-effect waves-light btn-large black">Editar</a>
						</p>
					<div class="divider"></div>
				</div>
			@endif
		@endguest
		<div class="row">
			<div id="disqus_thread"></div>
			<script>

				/**
				*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
				*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
				/*
				var disqus_config = function () {
				this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
				this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
				};
				*/
				(function() { // DON'T EDIT BELOW THIS LINE
					var d = document, s = d.createElement('script');
					s.src = 'https://youngmexico.disqus.com/embed.js';
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
				})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		</div>
	</div>

	<script id="dsq-count-scr" src="//youngmexico.disqus.com/count.js" async></script>
	<script src="{{asset('/js/sweetalert2.js') }}" type="text/javascript" charset="utf-8"></script>
    @if (notify()->ready())
        <script>
            swal({
                title: "{!! notify()->message() !!}",
                text: "{!! notify()->option('text') !!}",
                type: "{{ notify()->type() }}",
                @if (notify()->option('timer'))
                    timer: {{ notify()->option('timer') }},
                    showConfirmButton: false
                @endif
            });
        </script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script type="text/javascript" src="{{asset('/js/sweetalert2.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/rateable.js') }}"></script>
    <script type="text/javascript">
        $("#input-id").rating();
    </script>
@endsection

