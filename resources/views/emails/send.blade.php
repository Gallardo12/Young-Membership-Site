<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Correo Electrónico de Contacto desde YoungMéxico</title>
    </head>

    <body style="padding: 0 10%;">
        <h1 style="text-align: center; background-color: #eee; color: #737373; padding: 10px;"><small>Recibiste un correo electrónico de</small> {{ $name }}</h1>
        <blockquote style="color:#666;">
            <h2>{{ $email }}</h2>
            <h3>Asunto:</h3>
            <h3><small>{{ $subject }}</small></h3>
            <p style="font-size: 16px;">{{ $mail_message }}</p>
        </blockquote>
        <h5 style="text-align: center; background-color: #eee; color: #737373; padding: 10px;">
            Este mensaje fue enviado usando el formulario de contacto en YoungMéxico
        </h5>
    </body>
</html>