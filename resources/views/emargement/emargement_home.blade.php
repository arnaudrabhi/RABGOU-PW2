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
            </div>
        </div>
    </div>

@endsection
