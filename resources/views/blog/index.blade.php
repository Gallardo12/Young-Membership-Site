@extends('layouts.app')

@section('content')

@include('partials.meta-static')

    <div class="container">

        <h2 class="center">Noticias</h2>

        <div class="row">

            @foreach ($blogs as $blog)

                <div class="col s12 m6">
                    <div class="card large">
                        <div class="card-image">
                            <img src="{{ asset('images/pic01.jpg') }}">
                            <span class="card-title">{{ $blog->title }}</span>
                        </div>
                        <div class="card-content">
                            <p><b>Creado el: </b>{{ $blog->updated_at }}</p>
                            <p>{{ str_limit($blog->body, 200) }}</p>
                        </div>
                        <div class="card-action text-teal">
                            <a class="teal-text" href="{{ action('BlogController@show', [$blog->id]) }}">Leer</a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </div>

@endsection