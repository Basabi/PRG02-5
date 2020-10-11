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
        <form method="post" action="{{route('game.store')}}">
            @csrf

        </form>
        @if($gameItem)
            <article>
                <h3 class="card-title">Votes: {{$gameItem['votes']}}</h3>
                <p>{{$gameItem['description']}}</p>
                <iframe width="420" height="315"
                        src="{{$gameItem['ytlink']}}">
                </iframe>
            </article>
        @endif
    </div>
@endsection
