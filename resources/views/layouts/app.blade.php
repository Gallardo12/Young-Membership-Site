<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('meta-title') - Young Mentorship</title>
        <meta name="description" content="@yield('meta-desc')">
        <meta name="author" content="@yield('meta-author')">

        <!-- Styles -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
                    <li class="active">
                        <a href="/">Young Mentorship</a>
                    </li>
                    <li>
                        <a href="/services">Servicios</a>
                    </li>
                    <li>
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
                @yield('content')

                <!-- Footer -->
                <footer id="footer">
                    <section class="split contact">
                        <section class="alt">
                            <p>
                                <strong>CONTÁCTANOS</strong>
                                : Si tienes dudas contactanos, estamos a para servirte.
                            </p>
                        </section>
                    </section>
                </footer>

            </div>

        </div>

        <!-- Scripts -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
        <script src="{{ asset('assets/js/skel.min.js') }}"></script>
        <script src="{{ asset('assets/js/util.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script type="text/javascript">
            $('#tag_list').select2();
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.6/tinymce.min.js"></script>
        <script>
            var editor_config = {
                path_absolute : "/",
                selector: "textarea.my-editor",
                plugins: [
                  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                  "searchreplace wordcount visualblocks visualchars code fullscreen",
                  "insertdatetime media nonbreaking save table contextmenu directionality",
                  "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                  var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                  if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                  } else {
                    cmsURL = cmsURL + "&type=Files";
                  }

                  tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                  });
                }
              };
            tinymce.init(editor_config);
        </script>

    </body>

</html>
