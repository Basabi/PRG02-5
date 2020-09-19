@extends('layouts.layout')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Voeg game muziek toe</h1>
        <a class="nav-link float-right" href="{{route('game.overzicht')}}">Terug naar game muziek overzicht</a>
    </header>

    <div class="container">
        <form method="post" action="{{route('game.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="title" name="title">
                @if($errors->has('title'))
                    <span class="alert-danger form-check-inline">{{$errors->first('title')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Beschrijving</label>
                <input type="text" class="form-control" id="description" name="description">
                @if ($errors->has('description'))
                    <span class="alert-danger form-check-inline">{{$errors->first('description')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="image">Afbeelding</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn-primary btn-block">Bericht opslaan</button>
        </form>
    </div>
@endsection
