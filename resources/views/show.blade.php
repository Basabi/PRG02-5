@extends('layouts.layout')

@section('content')
    <header class="jumbotron">
        @if($gameItem)
            <h1 class="modal-title float-left">{{$gameItem['title']}}</h1>
        @else
            <h1 class="modal-title float-left">{{$error}}</h1>
        @endif
        <a class="nav-link float-right" href="{{route('game.overzicht')}}">Terug naar game muziek overzicht</a>
    </header>

    <div class="container">
        @if($gameItem)
            <article>
                <p>{{$gameItem['description']}}</p>
                <iframe width="420" height="315"
                        src="{{$gameItem['link']}}">
                </iframe>
            </article>
        @endif
    </div>
@endsection
