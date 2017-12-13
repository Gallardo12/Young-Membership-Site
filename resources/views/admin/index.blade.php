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
                    <div class="collapsible-header flow-text"><i class="material-icons">room_service</i>Servicios</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <h5 class="center">Servicios Recientes</h5>
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
                                            <td class="center">{{ $service->title }}</td>
                                            <td class="center">Admin</td>
                                            <td class="center">
                                                @if($service->status == 0)
                                                        Borrador
                                                    @else
                                                        Publicado
                                                    @endif
                                            </td>
                                            <td class="center">
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
                                            </td>
                                            <td class="center">
                                                <a href="{{ action('ServiceController@show', [$service->id]) }}" class="btn-floating btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ver Servicio"><i class="material-icons">remove_red_eye</i></a>
                                                <a href="{{ action('ServiceController@edit', [$service->id]) }}" class="btn-floating btn-large waves-effect waves-light blue tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar Servicio"><i class="material-icons">mode_edit</i></a>
                                                <a href="{{ action('ServiceController@destroy', [$service->id]) }}" class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Eliminar Servicio"><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                    <div class="collapsible-header flow-text"><i class="material-icons">fiber_new</i>Noticias</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <h5 class="center">Noticias Recientes</h5>
                            <table class="centered responsive-table bordered">
                                <thead>
                                    <tr>
                                        <th>Noticia</th>
                                        <th>Autor</th>
                                        <th>Fecha Creación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($blog as $blog)
                                        <tr>
                                            <td class="center">{{ $blog->title }}</td>
                                            <td class="center">Admin</td>
                                            <td class="center">{{ $blog->updated_at->diffForHumans() }}</td>
                                            <td class="center">
                                                <a href="{{ action('BlogController@show', [$blog->id]) }}" class="btn-floating btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ver Servicio"><i class="material-icons">remove_red_eye</i></a>
                                                <a href="{{ action('BlogController@edit', [$blog->id]) }}" class="btn-floating btn-large waves-effect waves-light blue tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar Servicio"><i class="material-icons">mode_edit</i></a>
                                                <a href="{{ action('BlogController@destroy', [$blog->id]) }}" class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Eliminar Servicio"><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col s12 m4 center">
                                <a href="/blog/" class="waves-effect waves-light btn-large"><i class="material-icons left">list</i>Ver</a>
                            </div>
                            <div class="col s12 m4 center">
                                <a href="/blog/create" class="waves-effect waves-light btn-large"><i class="material-icons left">add_circle_outline</i>Nuevo</a>
                            </div>
                            <div class="col s12 m4 center">
                                <a href="/blog/bin" class="waves-effect waves-light btn-large"><i class="material-icons left">delete</i>Papelera</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header flow-text"><i class="material-icons">view_list</i>Categorias</div>
                    <div class="collapsible-body">
                        <h5 class="center">Categorías Recientes</h5>

                        <div class="row">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="center flow-text">Nombre</th>
                                        <th class="center flow-text">Fecha Creación</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="center">{{ $category->name }}</td>
                                            <td class="center">{{ $category->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 center">
                                <a href="/categories" class="waves-effect waves-light btn-large"><i class="material-icons left">list</i>Ver</a>
                            </div>
                            <div class="col s12 m6 center">
                                <a href="/categories/create" class="waves-effect waves-light btn-large"><i class="material-icons left">add_circle_outline</i>Nuevo</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header flow-text"><i class="material-icons">supervisor_account</i>Usuarios</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <h5 class="center">Usuarios Recientes</h5>
                            <div class="col s12">
                                <table class="centered responsive-table bordered" style="margin-top: 2em;">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Fecha Registro</th>
                                            <th>Rol</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                                <td>{{ $user->role->name}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 center">
                                <a href="/users" class="waves-effect waves-light btn-large"><i class="material-icons left">list</i>Ver</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

@endsection
