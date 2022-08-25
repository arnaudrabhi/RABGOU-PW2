<?php
use Illuminate\Support\Facades\Auth as Auth;
    $color = "#26474E";

    $isAuth = Auth::user();

    if ($isAuth){
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
    }
    ?>
@section('topbar')
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: {{$color}}">
        <a class="navbar-brand" href="/RABGOU-PW2/public">Intranet</a>
        @if($isAuth)
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
            <ul class="navbar-nav mr-11">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="navbar-text">
                            {{ Illuminate\Support\Facades\Auth::user()->getRoleLib() }}
                            {{ Illuminate\Support\Facades\Auth::user()->civ }}
                            {{ Illuminate\Support\Facades\Auth::user()->nom }}
                            {{ Illuminate\Support\Facades\Auth::user()->prenom }}
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
{{--                        <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                    </ul>
                </li>
            </ul>
            @endif
        </div>
    </nav>
@endsection
