<?php
use Illuminate\Support\Facades\Auth as Auth;
    $color = "#d14747";
    switch (Auth::user()->role) {
        case "1":
            $color = "#d14747";
            break;
        case "2":
            $color = "orange";
            break;
        case "3":
            $color = "green";
            break;
        case "4":
        default:
            $color = 'rgba(0, 102, 255, 0.83)';
    }
    ?>
@section('topbar')
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: {{$color}}">
        <a class="navbar-brand" href="#">Intranet</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="">Cours </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Feuille d'émargement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboardAdmin') }}">Gestion</a>
                </li>
            </ul>
            <span class="navbar-text">
            Bonjour,<br />
            {{ Illuminate\Support\Facades\Auth::user()->civ }}
            {{ Illuminate\Support\Facades\Auth::user()->nom }}
            {{ Illuminate\Support\Facades\Auth::user()->prenom }}
            <!-- <p class="fs-6">{{ Illuminate\Support\Facades\Auth::user()->getRoleLib() }}</p> -->
                <br />
        </span>

        </div>
    </nav>
@endsection
