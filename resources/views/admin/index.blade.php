@extends('layouts.app')

@section('content')

@include('partials.meta-static')

    <div class="container">
        <h2 class="center">Panel de Administrador</h2>
        <div class="divider"></div>
        <div class="row">
            <p class="flow-text" align="center">
                <strong>Bienvenido</strong>
                <em> {{ Auth::user()->name }}</em>
            </p>
        </div>
        <div class="row">
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header flow-text active"><i class="material-icons">room_service</i>Servicios</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <div class="col s12 m4 center">
                                <a href="/services/" class="waves-effect waves-light btn-large"><i class="material-icons left">list</i>Ver</a>
                            </div>
                            <div class="col s12 m4 center">
                                <a href="/services/create" class="waves-effect waves-light btn-large"><i class="material-icons left">add_circle_outline</i>Nuevo</a>
                            </div>
                            <div class="col s12 m4 center">
                                <a href="/services/bin" class="waves-effect waves-light btn-large"><i class="material-icons left">delete</i>Papelera</a>
                            </div>
                        </div>
                        <div class="row">
                            <h5 style="margin-top: 2em;" class="center">Servicios Recientes</h5>
                            <table class="centered responsive-table bordered">
                                <thead>
                                    <tr>
                                        <th>Servicio</th>
                                        <th>Autor</th>
                                        <th>Status</th>
                                        <th>Publicar</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($service as $service)
                                        <tr>
                                            <th class="center flow-text">{{ $service->title }}</th>
                                            <th class="center flow-text">Admin</th>
                                            <th class="center flow-text">
                                                @if($service->status == 0)
                                                        Borrador
                                                    @else
                                                        Publicado
                                                    @endif
                                            </th>
                                            <th class="center">
                                                <div class="container">
                                                    @if($service->status == 0)
                                                        {{ Form::model($service, ['method' => 'PATCH', 'action' => ['ServiceController@publish', $service->id]]) }}
                                                            {{ Form::select('status', ['0' => 'Borrador', '1' => 'Publicado'], null, ['class' => '']) }}
                                                            {{ Form::submit('Aplicar', ['class' => 'waves-effect waves-light btn']) }}
                                                        {{ Form::close() }}
                                                    @else
                                                        {{ Form::model($service, ['method' => 'PATCH', 'action' => ['ServiceController@publish', $service->id]]) }}
                                                            {{ Form::select('status', ['0' => 'Borrador', '1' => 'Publicado'], null, ['class' => '']) }}
                                                            {{ Form::submit('Aplicar', ['class' => 'waves-effect waves-light btn']) }}
                                                        {{ Form::close() }}
                                                    @endif
                                                </div>
                                            </th>
                                            <th class="center flow-text">
                                                <a href="{{ action('ServiceController@show', [$service->id]) }}" class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">remove_red_eye</i></a>
                                                <a class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">mode_edit</i></a>
                                                <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header flow-text"><i class="material-icons">fiber_new</i>Noticias</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <div class="col s12 m4 center">
                                <a href="/blog/" class="waves-effect waves-light btn-large"><i class="material-icons left">list</i>Ver</a>
                            </div>
                            <div class="col s12 m4 center">
                                <a href="/blog/create" class="waves-effect waves-light btn-large"><i class="material-icons left">add_circle_outline</i>Nuevo</a>
                            </div>
                            <div class="col s12 m4 center">
                                <td><a href="/blog/bin" class="waves-effect waves-light btn-large"><i class="material-icons left">delete</i>Papelera</a></td>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header flow-text"><i class="material-icons">view_list</i>Categorias</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <div class="col s12 m4 center">
                                <a href="/categories" class="waves-effect waves-light btn-large"><i class="material-icons left">list</i>Ver</a>
                            </div>
                            <div class="col s12 m4 center">
                                <a href="/categories/create" class="waves-effect waves-light btn-large"><i class="material-icons left">add_circle_outline</i>Nuevo</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

@endsection
