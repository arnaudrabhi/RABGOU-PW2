@extends('layouts.default-layout')

@section('content')
    <br />
    <br />
    <div class="row">
        <div class="col-1">
            <p>&nbsp</p></div>
        <div class="col-3">
            <h1 class="h1">Intranet</h1>
            <ul>
                <li>
                    <a href="{{ route('register') }}" class="text-xl">Inscription</a>
                </li>
                <li>
                    <a href="{{ route('login') }}" class="text-xl">Connexion</a>
                </li>
            </ul>
        </div>
    </div>

@endsection
