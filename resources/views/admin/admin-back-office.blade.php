@extends('layouts.default-layout')

@section('head')
    @vite(['resources/js/adminBackOffice.js', 'resources/js/vue/Eleve/EleveView.vue'])
@endsection



@section('content')
    <div id="EleveView">
        <eleve-view></eleve-view>
    </div>
@endsection
