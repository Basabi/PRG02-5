@extends('layouts.layout')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Game muziek</h1>
        <a class="nav-link float-right" href="{{route('game.create')}}">Voeg nieuwe game muziek toe</a>


    </header>

    <div class="container">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{$message}}</strong>
            </div>
        @endif
                <div style="border:1px solid black" class="row">
                    @foreach($gameItems as $gameItem)
                        <div  class="col-sm-4 card border-0">
                            <h2 class="card-title">{{$gameItem['title']}}</h2>
                            <h3 class="card-title">Votes: {{$gameItem['votes']}}</h3>
                            <img  class="card-img" width="50%" height="50%" src="{{$gameItem['image']}}" alt="{{$gameItem['title']}}" >
                            <a class="btn btn-light" href="{{route('game.show', $gameItem['id'])}}">Luister de muziek</a>
                        </div>
                    @endforeach
                </div>
    </div>
@endsection
