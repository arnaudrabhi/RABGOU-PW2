<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use App\Models\FeuilleEmargement;
use App\Models\SignatureFeuilleEmargement;

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
            $feuillesEmargementArray[] = array_merge(
                $feuille->toArray(),
                ['classe' => $feuille->classe->toArray()],
                ['cours' => $feuille->cour->toArray()],
                ['enseignant' => array_merge($feuille->enseignant->toArray(), $feuille->enseignant->user->toArray())],
            );
        }

        return array_reverse($feuillesEmargementArray);
    }

    public function getFeuilleData($id) {
        $feuille = FeuilleEmargement::where('id', '=', $id)->first();

        $eleves = Eleve::where('classe_id', '=', $feuille->classe->id)->get();

        $elevesArray= [];

        foreach ($eleves as $eleve) {
            $signature = SignatureFeuilleEmargement::query()
                ->where('feuille_emargement_id', '=', $feuille->id)
                ->where('eleve_user_id', '=', $eleve->id)
                ->first();

            if ($signature == null) {
                $elevesArray[] = array_merge(
                    $eleve->toArray(),
                    ['statut_signature' => '0'],
                    $eleve->user->toArray()
                );

            } else {
                $elevesArray[] = array_merge(
                    $eleve->toArray(),
                    ['statut_signature' => $signature->statut],
                    $eleve->user->toArray()
                );
            }
        }

        return array_merge(
            $feuille->toArray(),
            ['classe' => $feuille->classe->toArray()],
            ['cours' => $feuille->cour->toArray()],
            ['enseignant' => array_merge($feuille->enseignant->toArray(), $feuille->enseignant->user->toArray())],
            ['eleves' => $elevesArray]
        );

    }



}
