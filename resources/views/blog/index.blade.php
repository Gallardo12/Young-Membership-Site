@extends('layouts.app')

@section('content')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}"/>
@endsection

@include('partials.meta-static')

    <div class="container">

        <h2 class="center">Noticias</h2>
        <div class="divider"></div>

        <div style="margin-top: 2em;" class="row">
            {{-- <div class="col s12">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('flash_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div> --}}

            @foreach ($blogs as $blog)

                <div class="col s12 m6 l4">
                    <div class="card medium">
                        <div class="card-image waves-effect waves-block waves-light">
                            @if ($blog->photob)
                                <img class="activator" data-caption="{{ $blog->title }}" src="/images/{{ $blog->photob ? $blog->photob->photob : '' }}" alt="{{ str_limit($blog->title, 50) }}" />
                            @else
                                <img class="activator" src="{{ asset('images/bg.jpg') }}">
                            @endif
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">{{ $blog->title }}<i class="material-icons right">more_vert</i></span>
                            <br>
                            <p align="center"><a class="btn" href="{{ action('BlogController@show', [$blog->id]) }}">Leer</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4 textoTeal">{{ $blog->title }}<i class="material-icons right">close</i></span>
                            <p><i class="material-icons textoTeal">date_range</i><b>Creado: </b>{{ $blog->updated_at->diffForHumans() }} por <a class="textoTeal" href="{{ route('users.show', $blog->user->username) }}">{{ $blog->user->name }}</a></p>
                            <p>{!! str_limit($blog->body, 500) !!}</p>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
        <div class="center-align">
            {!! $blogs->links() !!}
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
