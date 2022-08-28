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

    public function getFeuilleData($id)
    {
        $feuille = FeuilleEmargement::where('id', '=', $id)->first();

        $eleves = Eleve::where('classe_id', '=', $feuille->classe->id)->get();

        $elevesArray = [];

        // Pour chaque eleve, on récupère le statut de la signature
        // Si le statut signature n'existe pas encore, on ajoute le statut_signature 0 à l'élève
        // Sinon, on ajoute le statut de la signature
        foreach ($eleves as $eleve) {
                $signature = SignatureFeuilleEmargement::firstOrCreate([
                    'feuille_emargement_id' => $feuille->id,
                    'eleve_user_id' => $eleve->user_id
                ], [
                    'statut' => 0
                ]);



            $elevesArray[] = array_merge(
                $eleve->toArray(),
                ['statut_signature' => $signature->statut],
                $eleve->user->toArray()
            );
        }

        return array_merge(
            $feuille->toArray(),
            ['classe' => $feuille->classe->toArray()],
            ['cours' => $feuille->cour->toArray()],
            ['enseignant' => array_merge($feuille->enseignant->toArray(), $feuille->enseignant->user->toArray())],
            ['eleves' => $elevesArray]
        );
    }

    public function setElevePresence($idfeuille, $ideleve)
    {
        $signature = SignatureFeuilleEmargement::query()
            ->where('feuille_emargement_id', '=', $idfeuille)
            ->where('eleve_user_id', '=', $ideleve)
            ->first();

        if ($signature == null) {
            $signature = new SignatureFeuilleEmargement([
                'feuille_emargement_id' => $idfeuille,
                'eleve_user_id'         => $ideleve,
                'statut'                => 3
            ]);
        } else {
            $signature->update([
                'statut' => 3
            ]);
        }
        $signature->save();
        return $signature->toArray();
    }


}
