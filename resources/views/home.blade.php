@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Welkom {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                    {{ __('You are logged in!') }}
                        <br>
                        <br>
                        <a class="" href="{{ route('game.overzicht') }}">
                            {{ __('Ga naar het overzicht') }}
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
