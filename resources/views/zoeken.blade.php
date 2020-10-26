@extends('layouts.layout')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Game muziek</h1>
        <a class="nav-link float-right" href="{{route('game.create')}}">Voeg nieuwe game muziek toe</a>


    </header>

    <h1>Zoeken naar titel</h1>
    <div class="container">
        <form method="post" action="{{route('zoekenResultaat')}}">
            @csrf
            <div class="form-group">
                <label for="title">Zoek naar resultaat</label>
                <input type="text" class="form-control" id="zoekveld" name="zoekveld">
                @if($errors->has('zoekveld'))
                    <span class="alert-danger form-check-inline">{{$errors->first('zoekveld')}}</span>
                @endif
            </div>
            <button type="submit" class="btn-primary btn-block">Zoek naar resultaat</button>
        </form>
    </div>

    <aside>
        <ul>

        </ul>
    </aside>

    <div class="container">

    </div>

@endsection
