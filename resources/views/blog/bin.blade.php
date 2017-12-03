<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - Noticias</title>

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
                    <li class="active">
                        <a href="/blog">Noticias</a>
                    </li>
                    <li>
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

            	<h2>Noticias (Papelera)</h2>

                <!-- Posts -->
                <section class="posts">

                    @foreach ($deletedBlogs as $blog)

                        <article>
                            <header>
                                <h3>{{ $blog->title }}</a></h3>
                                <span class="date">{{ $blog->updated_at }}</span>
                                <a disabled class="image fit">
                                        <img src="images/pic02.jpg" />
                                    </a>
                                <p>{{ $blog->body }}</p>
                                <ul class="actions">
                                    <li>
                                        <a href="{{ action('BlogController@restore', [$blog->id]) }}" class="button">Restaurar</a>
                                    </li>
                                    <li>
                                        <a href="{{ action('BlogController@destroyBlog', [$blog->id]) }}" class="button">Eliminar</a>
                                    </li>
                                </ul>
                            </header>
                        </article>

                    @endforeach

                </section>

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