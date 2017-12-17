<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('meta-title') - Young México</title>
        <meta name="description" content="@yield('meta-desc')">
        <meta name="author" content="@yield('meta-author')">

        <!-- Styles -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <!-- Compiled and minified CSS -->
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
    </head>

    <body>
        <header>
            <div class="navbar-fixed">
                <nav class="white">
                    <div class="nav-wrapper">
                        <a href="/" class="brand-logo">Young<span class="textoTeal">México</span></a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse grey-text text-darken-4"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="/">Young<span class="textoTeal">México</span></a></li>
                            <li><a href="/services">Servicios</a></li>
                            <li><a href="/blog">Noticias</a></li>
                            <li><a href="/contact">Contáctanos</a></li>
                            <!-- Authentication Links -->
                            @guest
                                <li>
                                    <a href="{{ route('login') }}">Ingresar</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @else
                                @if(Auth::user()->role_id == 1)
                                    <li>
                                        <a href="/admin">Admin</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="/home">{{ Auth::user()->name }} </a>
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
                        <ul class="side-nav" id="mobile-demo">
                            <!-- Authentication Links -->
                            @guest
                                <li><a href="/">Young<span class="textoTeal">México</span></a></li>
                                <li><a href="/services">Servicios</a></li>
                                <li><a href="/blog">Noticias</a></li>
                                <li><a href="/contact">Contáctanos</a></li>
                                <li>
                                    <a href="{{ route('login') }}">Ingresar</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @else
                                <li>
                                    <div class="user-view">
                                        <div class="background">
                                            <img class="responsive-img" src="{{ asset('images/pic04.jpg') }}">
                                        </div>
                                        <a href="#!user"><img class="circle" src="{{ asset('images/user.png') }}"></a>
                                        <a href="#!name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
                                        <a href="#!email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
                                    </div>
                                </li>
                                <li><a href="/">Young<span class="textoTeal">México</span></a></li>
                                <div class="divider"></div>
                                <li><a href="/services">Servicios</a></li>
                                <li><a href="/blog">Noticias</a></li>
                                <li><a href="/contact">Contáctanos</a></li>
                                @if(Auth::user()->role_id == 1)
                                    <div class="divider"></div>
                                    <li>
                                        <a href="/admin">Admin</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="#!">
                                        <i class="material-icons">cloud</i>
                                        First Link With Icon
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Second Link
                                    </a>
                                </li>
                                <li>
                                    <div class="divider"></div>
                                </li>
                                <li>
                                    <a class="subheader">Subheader</a>
                                </li>
                                <li>
                                    <a class="waves-effect" href="#!">Third Link With Waves</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            @yield('content')
            @yield('javascript')
        </main>
        <footer class="page-footer white z-depth-5">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="textoColor center">Contáctanos!!</h5>
                <p class="grey-text text-darken-4" align="center">Si tienes dudas contactanos, estamos a para servirte.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="textoColor center">Búscanos en las Redes Sociales...</h5>
                <ul class="center">
                  <li><a class="grey-text text-darken-4" href="https://www.twitter.com/youngmentorship/" target="_blank">Twitter</a></li>
                  <li><a class="grey-text text-darken-4" href="https://www.facebook.com/YOUNGMEXIC0/" target="_blank">Facebook</a></li>
                  <li><a class="grey-text text-darken-4" href="https://www.instagram.com/youngmentorship/" target="_blank">Instagram</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container textoColor">
            © 2017 Young<span class="textoTeal">México</span>
            <a class="grey-text text-darken-4 right" href="#!">by Hex<span class="textoTeal">Code</span></a>
            </div>
          </div>
        </footer>

        <!--Import jQuery before materialize.js-->
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="{{asset('/js/app.js') }}" type="text/javascript" charset="utf-8" async defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script type="text/javascript">
            $('#tag_list').select2();
        </script>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
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
