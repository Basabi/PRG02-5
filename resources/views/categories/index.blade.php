@extends('layouts.layout')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Game muziek</h1>
        <a class="nav-link float-right" href="{{route('game.create')}}">Voeg nieuwe game muziek toe</a>


    </header>

    <h1>Categories</h1>

    <aside>
        <ul>
            @foreach($categories as $category)
                <li><a href="#{{$category->title}}">{{$category->title}}</a></li>
            @endforeach
        </ul>
    </aside>

    <div class="container">
        @foreach($categories as $category)
            <h2 id="{{$category->title}}">{{$category->title}}</h2>

            <div class="row">
                @foreach($category->gameItems as $gameItem)
                    <div  class="col-sm-4 card border-0">
                        <h2 class="card-title">{{$gameItem['title']}}</h2>
                        <h3 class="card-title">{{$gameItem['category']->title}}</h3>
                        <h3 class="card-title">Votes: {{$gameItem['votes']}}</h3>
                        <img  class="card-img" width="50%" height="50%" src="{{$gameItem['image']}}" alt="{{$gameItem['title']}}" >
                        <a class="btn btn-light" href="{{route('game.show', $gameItem['id'])}}">Luister de muziek</a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

@endsection
