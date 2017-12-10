@extends('layouts.app')

@section('content')

@include('partials.meta-static')

    <div class="parallax-container">
        <div class="section">
            <div class="container">
                <br><br>
                <h2 class="header center teal-text">Contacto Young<span class="textoWhite">México</span></h2>
                <div class="row center">
                    <h5 class="header col s12 teal-text text-lighten-2">Encuentra el servicio que necesites y contacta con los emprendedores.<br/>Tenemos la solución a lo que estas buscando.</h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="{{ asset('images/pic01.jpg') }}"></div>
    </div>

    <div class="container">
        <p class="flow-text" align="center">Young<span class="textoTeal">México</span> es un servicio web el cual apoya a las personas emprendedoras y freelancers que desean destacar en el ambito laboral, esta herramienta te permitirá encontrar el servicio que buscas a los mejores precios por nuestros propios emprendedores. Incluso puedes ser uno de ellos y promocionar tu servicio en este sitio.</p>
        <div class="divider"></div>
        <h2 class="center">Uneté como Emprendedor</h2>
        <p class="flow-text" align="center">¿Estas interesado en ser un emprendedor en Young<span class="textoTeal">México</span>? Aplica para ser el siguiente emprendedor y comienza a vender tus sercivios como afiliado a la plataforma.</p>
        <div class="divider"></div>
        <h4 class="center">Afiliate a Young<span class="textoTeal">México</span></h4>
        <div class="row">
            <form class="alt" method="POST" action="{{ route('contact-us.store') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <label for="name">Nombre Completo</label>
                        <input type="text" name="name" id="name" value="" />
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <label for="email">Correo Electrónico</label>
                        <input type="email" name="email" id="email" value="" />
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">message</i>
                        <label for="message">Mensaje</label>
                        <textarea name="message" id="message" class="materialize-textarea" rows="10"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 center">
                        <input type="submit" value="Enviar Mensaje" class="waves-effect waves-light btn-large" name="submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection