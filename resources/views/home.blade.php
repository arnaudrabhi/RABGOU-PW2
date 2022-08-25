<?php
use Illuminate\Support\Facades\Auth as Auth;
$color = "#26474E";

$connectedUser = Auth::user();
?>
@extends('layouts.default-layout')

@section('script')
    @vite(['resources/js/app.js', 'resources/js/coursActuel.js'])
@endsection

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
        </div>
        <div class="col">
            @if($connectedUser->role != 2)
                <div id="CoursView" class="position-relative">
                    <cours-view
                        :iseleve="{{ in_array($connectedUser->role, [1, 3]) ? 'false' : 'true'}}"
                        :iduser="{{\Illuminate\Support\Facades\Auth::user()->id}}"
                    >

                    </cours-view>
                </div>
            @endif
        </div>
    </div>

@endsection
