@extends('layouts.app')

@section('content')

@include('partials.meta-static')

    <div class="container">
        <h2 class="center">Panel de Administrador</h2>
        <div class="row">
            <p class="flow-text" align="center">
                <strong>Bienvenido</strong>
                <em> {{ Auth::user()->name }}</em>
            </p>
        </div>
        <div class="row">
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header flow-text active"><i class="material-icons">fiber_new</i>Noticias</div>
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
                    <div class="collapsible-header flow-text"><i class="material-icons">room_service</i>Servicios</div>
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
