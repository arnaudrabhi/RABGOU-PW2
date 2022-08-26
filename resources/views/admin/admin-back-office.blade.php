@extends('layouts.default-layout')

@section('head')
    @vite(['resources/js/adminBackOffice.js', 'resources/js/vue/Eleve/EleveView.vue'])
@endsection



@section('content')
    <div id="appBackOffice">
        <app-back-office></app-back-office>
    </div>

@endsection
