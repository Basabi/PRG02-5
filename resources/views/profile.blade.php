@extends('layouts.layout')

@section('content')

    <header class="jumbotron">
        <h1 class="modal-title float-left">Verander je gegevens</h1>
    </header>

    <div class="container">
        <form action="{{route('profile.update')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Gebruikersnaam</label>
                <input type="text" class="form-control" id="gebruikersnaam" name="gebruikersnaam" value="{{ Auth::user()->name }}">
                @if($errors->has('gebruikersnaam'))
                    <span class="alert-danger form-check-inline">{{$errors->first('gebruikersnaam')}}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="title">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                @if($errors->has('email'))
                    <span class="alert-danger form-check-inline">{{$errors->first('email')}}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="title">Nieuw wachtwoord</label>
                <input type="password" class="form-control" id="wachtwoord" name="wachtwoord">
                @if($errors->has('wachtwoord'))
                    <span class="alert-danger form-check-inline">{{$errors->first('wachtwoord')}}</span>
                @endif
            </div>
            <button type="submit" class="btn-primary btn-block">Gegevens opslaan</button>
        </form>
    </div>

@endsection
