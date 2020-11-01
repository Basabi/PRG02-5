@extends('layouts.layout')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Admin control paneel</h1>
    </header>
            <div class="container">
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{$message}}</strong>
                    </div>
                @endif

                @foreach($gameItems as $gameItem)
                    <form method="post" action="{{route('game.waardig', $gameItem['id'])}}')}}">
                        @csrf
                        <table style="border:1px solid black; width: 100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>titel</th>
                                <th>beschrijving</th>
                                <th>youtube link</th>
                                <th>Voorpagina waardig?</th>
                                <th>Verwijderen</th>
                            </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>{{$gameItem['id']}}</td>
                                    <td>{{$gameItem['title']}}</td>
                                    <td>{{$gameItem['description']}}</td>
                                    <td><a href="{{$gameItem['ytlink']}}">{{$gameItem['ytlink']}}</a></td>

                                    @if($gameItem['likes'] == 0)
                                        <input type="hidden" id="waardig" name="waardig" value="welwaardig">
                                        <td> <button type="submit" class="btn btn-danger"> Nee. Aanpassen naar waardig?</button></td>
                                    @endif

                                    @if($gameItem['likes'] == 1)
                                        <input type="hidden" id="waardig" name="waardig" value="nietwaardig">
                                        <td> <button type="submit" class="btn btn-primary"> Ja. Aanpassen naar niet waardig?</button></td>
                                    @endif

                                    <td><a class="btn btn-light" href="{{route('game.delete', $gameItem['id'])}}">Delete</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <br>
                    @endforeach
            </div>
@endsection
