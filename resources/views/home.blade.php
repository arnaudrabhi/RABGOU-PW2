<?php
use Illuminate\Support\Facades\Auth as Auth;
$color = "#26474E";

$connectedUser = Auth::user();
?>
@extends('layouts.default-layout')

@section('content')
    <br />
    <br />
    <div class="row mt-10">
        <div class="col">
            <h1 class="h1">Prosign</h1>
            <div class="mt-10">
                <p>Bienvenue {{$connectedUser->civ}} {{$connectedUser->nom}} {{$connectedUser->prenom}}</p>
                <p>Prosign est un logiciel web dédié à l'émargement des élèves d'une classe</p>
            </div>
{{--            <ul>--}}
{{--                <li>--}}
{{--                    <a href="{{ route('register') }}" class="text-xl">Inscription</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{ route('login') }}" class="text-xl">Connexion</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </div>
    </div>

@endsection
