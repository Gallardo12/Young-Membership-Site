@extends('layouts.app')

@section('title', 'Young Mentorship -- Noticias')

@section('content')

@include('partials.meta-dynamic2')

	<div class="container">

		<h2 class="center">{{ $blog->title }}</h2>
		<div class="divider"></div>
		<p>{!! $blog->body !!}</p>
		<div class="divider"></div>
		<p style="margin-top: 2em;" class="flow-text" align="center">
			<b>Creado: </b>{{ $blog->updated_at->diffForHumans() }} por <a class="textoAmber" href="{{ route('users.show', $blog->user->username) }}">{{ $blog->user->name }}</a>
		</p>
		@guest

		@else
			@if(Auth::user()->role_id == 1 || Auth::user()->id == $blog->user_id)
				<div class="row">
					<div class="divider"></div>
						<p align="center">
							<a href="{{ action('BlogController@edit', [$blog->id]) }}" class="waves-effect waves-light btn-large black">Editar</a>
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

@endsection

