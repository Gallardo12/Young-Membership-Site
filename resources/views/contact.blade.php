@extends('layouts.app')

@section('content')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}"/>
@endsection

@include('partials.meta-static')

    <div class="parallax-container">
        <div class="section">
            <div class="container">
                <br><br>
                <h2 class="header center">Contacto Young<span class="textoAmber">México</span></h2>
                <div class="row center">
                    <h5 class="header col s12 white-text flow-text">Encuentra el servicio que necesites y contacta con los emprendedores.<br/>Tenemos la solución a lo que estas buscando.</h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img style="-webkit-filter: grayscale(400%) saturate(800%); filter: grayscale(400%) saturate(800%);" src="{{ asset('images/pic01.jpg') }}"></div>
    </div>

    <div class="container">
        <p class="flow-text" align="center">Young<span class="textoAmber">México</span> es un servicio web el cual apoya a las personas emprendedoras y freelancers que desean destacar en el ambito laboral, esta herramienta te permitirá encontrar el servicio que buscas a los mejores precios por nuestros propios emprendedores. Incluso puedes ser uno de ellos y promocionar tu servicio en este sitio.</p>
        <div class="divider"></div>
        <h2 class="center">Uneté como Emprendedor</h2>
        <p class="flow-text" align="center">¿Estas interesado en ser un emprendedor en Young<span class="textoAmber">México</span>? Aplica para ser el siguiente emprendedor y comienza a vender tus sercivios como afiliado a la plataforma.</p>
        <div class="divider"></div>
        <h4 class="center">Afiliate a Young<span class="textoAmber">México</span></h4>
        <div class="row">
            {{ Form::open(['method' => 'POST', 'action' => 'MailController@send']) }}
                <div class="row">
                    <div class="input-field col s8 col offset-s2">
                        <i class="material-icons prefix">account_circle</i>
                        {{ Form::label("name", "Nombre") }}
                        {{ Form::text("name", null, ['class' => '']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 col offset-s2">
                        <i class="material-icons prefix">email</i>
                        {{ Form::label("email", "Correo Electrónico") }}
                        {{ Form::email("email", null, ['class' => '']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 col offset-s2">
                        <i class="material-icons prefix">subject</i>
                        {{ Form::label("subject", "Asunto") }}
                        {{ Form::text("subject", null, ['class' => '']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 col offset-s2">
                        <i class="material-icons prefix">message</i>
                        {{ Form::label("mail_message", "Mensaje") }}
                        {{ Form::textarea("mail_message", null, ['class' => 'materialize-textarea']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 center-align">
                        {{ Form::submit("Enviar Mensaje", ['class' => 'waves-effect waves-light btn-large black']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>

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

@endsection