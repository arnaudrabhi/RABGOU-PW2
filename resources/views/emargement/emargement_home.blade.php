<?php
use Illuminate\Support\Facades\Auth as Auth;
$color = "#26474E";

$connectedUser = Auth::user();
?>
@extends('layouts.default-layout')

@section('script')
    @vite(['resources/js/app.js', 'resources/js/feuilleEmargement.js'])
@endsection

@section('content')
    <br />
    <br />
    <div class="row mt-10">
        <div id="EmargementView">
            <emargement-view>
            </emargement-view>
        </div>
    </div>

@endsection
