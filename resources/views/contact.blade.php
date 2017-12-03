<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - Contacto</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
        <noscript>
        	<link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" />
        </noscript>
    </head>

    <body class="is-loading">

        <!-- Wrapper -->
        <div id="wrapper" class="fade-in">

            <!-- Header -->
            <header id="header">
                <a href="/" class="logo">Young Mentorship</a>
            </header>

            <!-- Nav -->
            <nav id="nav">
                <ul class="links">
                    <li>
                    	<a href="/">Young Mentorship</a>
                    </li>
                    <li>
                    	<a href="/services">Servicios</a>
                    </li>
                    <li>
                        <a href="/blog">Noticias</a>
                    </li>
                    <li class="active">
                    	<a href="/contact">Contáctanos</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        <li>
                            <a href="{{ route('login') }}">Ingresar</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @else
                        <li>
                            <a href="/home">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endguest
                </ul>
                <ul class="icons">
                    <li>
                    	<a href="https://www.twitter.com/youngmentorship/" class="icon fa-twitter" target="_blank">
                    		<span class="label">Twitter</span>
                    	</a>
                    </li>
                    <li>
                    	<a href="https://www.facebook.com/YOUNGMEXIC0/" class="icon fa-facebook" target="_blank">
                    		<span class="label">Facebook</span>
                    	</a>
                    </li>
                    <li>
                    	<a href="https://www.instagram.com/youngmentorship/" class="icon fa-instagram" target="_blank">
                    		<span class="label">Instagram</span>
                    	</a>
                    </li>
                </ul>
            </nav>

            <!-- Main -->
            <div id="main">

                <!-- Featured Post -->
				<article class="post featured">
					<header class="major">
						<h2>Contacto</h2>
					</header>
					<a disabled class="image main">
						<img src="images/ym-black.png" alt="" class="image main"/>
					</a>
					<p>Young Mentorship es un servicio web el cual apoya a las personas emprendedoras y freelancers que desean destacar en el ambito laboral, esta herramienta te permitirá encontrar el servicio que buscas a los mejores precios por nuestros propios emprendedores. Incluso puedes ser uno de ellos y promocionar tu servicio en este sitio.</p>
				</article>

                <!-- Posts -->
                <article class="post featured">
					<header class="major">
						<h2>Uneté como Emprendedor</h2>
					</header>
					<p>¿Estas interesado en ser un emprendedor en Young Mentorship? Aplica para ser el siguiente emprendedor y comienza a vender tus sercivios como afiliado a la plataforma.</p>

					<!-- Form -->
					<h2>Afiliate a Young Mentorship</h2>

					<form class="alt" method="POST" action="{{ route('contact-us.store') }}">

                        {{ csrf_field() }}

						<div class="row uniform">

							<div class="6u 12u$(xsmall)">
								<input type="text" name="name" id="name" value="" placeholder="Nombre Completo" />
							</div>
							<div class="6u$ 12u$(xsmall)">
								<input type="email" name="email" id="email" value="" placeholder="Correo Electrónico" />
							</div>

							<!-- Break -->
							<div class="12u$">
								<textarea name="message" id="message" placeholder="Describe el tipo de servicio que quieres ofertar en Young Mentorship" rows="6"></textarea>
							</div>

							<!-- Break -->
							<div class="12u$">
								<ul class="actions">
									<li>
										<input type="submit" value="Enviar Mensaje" class="special" name="submit" />
									</li>
								</ul>
							</div>

						</div>
					</form>
				</article>
			</div>

			<!-- Footer -->
			<footer id="footer">
				<section class="split contact">
					<section class="alt">
						<h3>
							<a href="/contact">Contáctanos</a>
						</h3>
						</br>
						<p>: Si tienes dudas contáctanos, estamos aquí para servirte.</p>
					</section>
				</section>
			</footer>
		</div>

        <!-- Scripts -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
        <script src="{{ asset('assets/js/skel.min.js') }}"></script>
        <script src="{{ asset('assets/js/util.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>

</html>
