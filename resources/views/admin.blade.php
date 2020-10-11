@extends('layouts.layout')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Admin control paneel</h1>
    </header>
            <div class="container">
                <table style="border:1px solid black;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>titel</th>
                        <th>beschrijving</th>
                        <th>votes</th>
                        <th>image link</th>
                        <th>youtube link</th>
                        <th>Bewerken</th>
                        <th>Verwijderen</th>
                        <th colspan="3"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gameItems as $gameItem)
                    <tr>
                        <td>{{$gameItem['id']}}</td>
                        <td>{{$gameItem['title']}}</td>
                        <td>{{$gameItem['description']}}</td>
                        <td>{{$gameItem['votes']}}</td>
                        <td><a href="{{$gameItem['image']}}">{{$gameItem['image']}}</a></td>
                        <td><a href="{{$gameItem['ytlink']}}">{{$gameItem['ytlink']}}</a></td>
                        <td><a href="#">Edit</a></td>
                        <td><a class="btn btn-light" href="{{route('game.delete', $gameItem['id'])}}">Delete</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
@endsection
