<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
        <noscript>
            <link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" />
        </noscript>
    </head>

    <body class="is-loading">

        <!-- Wrapper -->
        <div id="wrapper" class="fade-in">

            <!-- Intro -->
            <div id="intro" style="padding: 8rem 4rem 16rem 4rem !important;">
                <h1>Bienvenido a<br/>Young Mentorship</h1>
                <p>Encuentra el servicio que necesites y contacta con los emprendedores.<br/>
                Tenemos la solución a lo que estas buscando.</p>
                <ul class="actions">
                    <li>
                        <a href="#header" class="button icon solo fa-arrow-down scrolly">Continuar</a>
                    </li>
                </ul>
            </div>

            <!-- Header -->
            <header id="header">
                <a href="/" class="logo">Young Mentorship</a>
            </header>

            <!-- Nav -->
            <nav id="nav">
                <ul class="links">
                    <li class="active">
                        <a href="/">Young Mentorship</a>
                    </li>
                    <li>
                        <a href="/services">Servicios</a>
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

                <!-- Featured Post -->
                <article class="post featured">
                    <header class="major">
                        <h2>¿Qué es Young Mentorship?</h2>
                        <p>Un servicio de emprendedores para emprendedores</p>
                    </header>
                    <a disabled class="image main">
                        <img src="images/pic01.jpg" class="image main"/>
                    </a>
                    <p>Young Mentorship es un servicio web el cual apoya a las personas emprendedoras y freelancers que desean destacar en el ambito laboral, esta herramienta te permitirá encontrar el servicio que buscas a los mejores precios por nuestros propios emprendedores. Incluso puedes ser uno de ellos y promocionar tu servicio en este sitio.</p>
                </article>

                <!-- Posts -->
                <section class="posts">
                    <article>
                        <header>
                            <span class="date">6 de Noviembre del 2017</span>
                            <h2>
                                <a href="#">Busca lo que<br/>Necesitas</a>
                            </h2>
                        </header>
                        <a disabled class="image fit">
                            <img src="images/pic02.jpg" />
                        </a>
                        <p>¿Estas buscando un fotografo para una sesión de fotos? ¿Un diseñador para tu marca personal? ¿Algun servicio en especifico? Ve a a la sección de Servicios y descubre lo que Young Mentorship tiene para tí.</p>
                        <ul class="actions">
                            <li>
                                <a href="/services" class="button">Ir a Servicios</a>
                            </li>
                        </ul>
                    </article>
                    <article>
                        <header>
                            <span class="date">6 de Noviembre del 2017</span>
                            <h2>
                                <a href="#">Unete al equipo<br/>Young Mentorship</a>
                            </h2>
                        </header>
                        <a disabled class="image fit">
                            <img src="images/pic03.jpg" alt="" />
                        </a>
                        <p>Ser emprendedor y vender tus servicios no es una tarea facil. Unete al equipo de trabajo y promociona tus servicios en Young Mentorship de una forma mas facil y sencilla.</p>
                        <ul class="actions">
                            <li>
                                <a href="/contact" class="button">Se un Young Mentorship</a>
                            </li>
                        </ul>
                    </article>
                </section>

            </div>

            <!-- Footer -->
            <footer id="footer">
                <section class="split contact">
                    <section class="alt">
                        <h3>
                            <a href="/contact">Contactanos</a>
                        </h3>
                        </br>
                        <p>: Si tienes dudas contactanos, estamos a para servirte.</p>
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
