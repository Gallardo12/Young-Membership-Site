@extends('layouts.app')

@section('content')

@include('partials.meta-static')

    <div class="parallax-container">
        <div class="section">
            <div class="container">
                <br><br>
                <h2 class="header center teal-text">Bienvenido a Young<span class="textoWhite">México</span></h2>
                <div class="row center">
                    <h5 class="header col s12 teal-text text-lighten-2">Encuentra el servicio que necesites y contacta con los emprendedores.<br/>
                Tenemos la solución a lo que estas buscando.</h5>
                </div><br><br>
                <nav>
                    <div class="nav-wrapper">
                        <form>
                            <div class="input-field teal">
                                <input id="search" type="search" placeholder="Todo lo que necesitas al alcance de un click..." required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
        <div class="parallax"><img src="{{ asset('images/pic01.jpg') }}"></div>
    </div>

    <div class="container">
        <div class="row">
            <h2 class="center">¿Qué es Young<span class="textoTeal">México</span>?</h2>
            <div class="divider"></div>
            <h4 class="center">
                Un servicio de emprendedores para emprendedores.
            </h4>
            <p class="center">
                <img src="{{ asset('images/pic03.jpg') }}" class="responsive-img"/>
            </p>
            <p class="flow-text" align="center">Young Mentorship es un servicio web el cual apoya a las personas emprendedoras y freelancers que desean destacar en el ambito laboral, esta herramienta te permitirá encontrar el servicio que buscas a los mejores precios por nuestros propios emprendedores. Incluso puedes ser uno de ellos y promocionar tu servicio en este sitio.</p>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="card large">
                    <div class="card-image">
                        <img src="{{ asset('images/bg.jpg') }}">
                        <span class="card-title">Busca lo que necesitas</span>
                    </div>
                    <div class="card-content">
                        <p>Young<span class="textoTeal">México</span> es un servicio web el cual apoya a las personas emprendedoras y freelancers que desean destacar en el ambito laboral, esta herramienta te permitirá encontrar el servicio que buscas a los mejores precios por nuestros propios emprendedores. Incluso puedes ser uno de ellos y promocionar tu servicio en este sitio.</p>
                    </div>
                    <div class="card-action">
                        <a class="grey-text text-darken-4" href="/services">Ir a Servicios</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card large">
                    <div class="card-image">
                        <img src="{{ asset('images/bg.jpg') }}">
                        <span class="card-title">Unete al equipo Young<span class="textoTeal">México</span></span>
                    </div>
                    <div class="card-content">
                        <p>¿Estas buscando un fotografo para una sesión de fotos? ¿Un diseñador para tu marca personal? ¿Algun servicio en especifico? Ve a a la sección de Servicios y descubre lo que Young<span class="textoTeal">México</span> tiene para tí.</p>
                    </div>
                    <div class="card-action">
                        <a class="grey-text text-darken-4" href="/contact">Se parte de Young<span class="textoTeal">México</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection