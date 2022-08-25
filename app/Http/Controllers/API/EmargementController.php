<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FeuilleEmargement;

class EmargementController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
    {
        $feuillesEmargement = FeuilleEmargement::all();
        $feuillesEmargementArray = [];
        foreach ($feuillesEmargement as $key => $feuille) {
            $feuillesEmargementArray[] = array_merge($feuille->toArray());
        }

        return array_reverse($feuillesEmargementArray);
    }
}
