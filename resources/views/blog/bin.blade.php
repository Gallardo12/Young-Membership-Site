@extends('layouts.app')

@section('content')

@include('partials.meta-static')

    <div class="container">
        <h2 class="center">Noticias (Papelera)</h2>
        <div class="divider"></div>

        <div class="row">
            @foreach ($deletedBlogs as $blog)

                <div style="margin-top: 2em;" class="col s12 m6">
                    <div class="card large">
                        <div class="card-image">
                            <img class="materialboxed responsive-img" data-caption="{{ $blog->title }}" src="{{ asset('images/bg.jpg') }}">
                            <a href="{{ action('BlogController@show', [$blog->id]) }}"><span class="card-title">{{ $blog->title }}</span></a>
                        </div>
                        <div class="card-content">
                            <p><b>Creado el: </b>{{ $blog->updated_at }}</p>
                            <p class="flow-text">{!! str_limit($blog->body, 75) !!}</p>
                        </div>
                        <div class="card-action text-teal">
                            <a class="flow-text btn-large" href="{{ action('BlogController@restore', [$blog->id]) }}">Restaurar</a>
                            <a class="flow-text btn-large red" href="{{ action('BlogController@destroyBlog', [$blog->id]) }}">Eliminar</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection