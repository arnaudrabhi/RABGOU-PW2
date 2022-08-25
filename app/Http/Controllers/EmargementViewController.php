<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class EmargementViewController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('emargement.emargement_home');
    }
}
