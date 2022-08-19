@extends('layouts.default-layout')

@section('head')
    @vite(['resources/js/adminBackOffice.js', 'resources/js/vue/EleveCrud/AppEleve.vue'])
@endsection



@section('content')


{{--    <div>--}}
{{--        <table>--}}
{{--            <thead>--}}
{{--                <tr>--}}
{{--                    <th>ID</th>--}}
{{--                    <th>Civ</th>--}}
{{--                    <th>Nom</th>--}}
{{--                    <th>Prénom</th>--}}
{{--                    <th>Moyenne</th>--}}
{{--                </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--                @foreach($eleves as $eleve)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $eleve->id }}</td>--}}
{{--                        <td>{{ $eleve->civ }}</td>--}}
{{--                        <td>{{ $eleve->nom }}</td>--}}
{{--                        <td>{{ $eleve->prenom }}</td>--}}
{{--                        <td>{{ $eleve->eleve->moyenne ?? ''}}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}

    <div id="AppEleve">
        <app-eleve></app-eleve>
    </div>

@endsection
<script>
</script>
