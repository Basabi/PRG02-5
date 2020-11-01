@extends('layouts.layout')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Voeg game muziek toe</h1>
        <a class="nav-link float-right" href="{{route('game.overzicht')}}">Terug naar game muziek overzicht</a>
    </header>
    @if(1 >= 0)
    <div class="container">
        <form method="post" action="{{route('game.store')}}">
            @csrf
            <div class="form-group">
                <label for="category">Categorie:</label>
                <select class="form-control" id="category" name="category">
                    @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['title']}}</option>
                    @endforeach
                </select>
                @if ($errors->has('title'))
                    <span class="alert-danger form-check-inline">{{$errors->first('category')}}</span>
                @endif
            </div>
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
                @if ($errors->has('image'))
                    <span class="alert-danger form-check-inline">{{$errors->first('image')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="link">Youtube embed link</label>
                <input type="text" class="form-control" id="ytlink" name="ytlink">
                @if ($errors->has('ytlink'))
                    <span class="alert-danger form-check-inline">{{$errors->first('ytlink')}}</span>
                @endif
            </div>
            <button type="submit" class="btn-primary btn-block">Bericht opslaan</button>
        </form>
    </div>
    @else
    <p>Je hebt nog geen rechten om te posten. Om rechten te krijgen moet je de onderstaande knop 5 keer indrukken.</p>
    <form action="">
        @if(1 == 1)
            <button type="submit">Klik nog 5 keer op mij!</button>
        @elseif(1 == 2)
            <button type="submit">Klik nog 4 keer op mij!</button>
        @elseif(1 == 3)
            <button type="submit">Klik nog 3 keer op mij!</button>
        @elseif(1 == 4)
            <button type="submit">Klik nog 2 keer op mij!</button>
        @elseif(1 == 5)
        <button type="submit">Klik nog 1 keer op mij!</button>
        @endif
    </form>
    @endif

@endsection
