<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use App\Models\Enseignant;
use App\Models\FeuilleEmargement;
use App\Models\SignatureFeuilleEmargement;
use App\Models\User;
use App\Models\Cour;
use Carbon\Carbon;

class CoursController extends Controller
{

    public function getActualCours($userID) {

        $user = User::find($userID)->first();

        if ($user->role == 4) {
            $date = Carbon::now('Europe/Paris')->toDateTimeString();

            $eleve = Eleve::find($userID)->first();

            $cours = Cour::query()
                ->where('classe_id', '=', $eleve->classe->id)
                ->where('groupe_id', '=', $eleve->groupe->id)
                ->where('date_heure_debut', '<', $date)
                ->where('date_heure_fin', '>',$date)
                ->limit(1)
                ->get()
            ;

            return $cours->toArray();
        }
        elseif ($user->role == 3) {
            $date = Carbon::now('Europe/Paris')->toDateTimeString();

            $eleve = Enseignant::find($userID)->first();

            $cours = Cour::query()
                ->where('classe_id', '=', $eleve->classe->id)
                ->where('groupe_id', '=', $eleve->groupe->id)
                ->where('date_heure_debut', '<', $date)
                ->where('date_heure_fin', '>',$date)
                ->limit(1)
                ->get()
            ;

            return $cours->toArray();
        }
        return abort('Vous n\'êtes pas un élève');
    }

    public function signCours($idcours, $iduser) {

        $feuille = FeuilleEmargement::query()
            ->where('cour_id', '=', $idcours)
            ->first();

        if ($feuille == null) {
            $cour = Cour::query()
                ->where('id', '=', $idcours)
                ->first();

            $feuille = new FeuilleEmargement([
                'classe_id' => $cour->classe->id,
                'cour_id' => $idcours,
                'enseignant_user_id' => $cour->enseignant
            ]);
        }

        $feuille->save();
        $feuille->refresh();

        $signature = new SignatureFeuilleEmargement([
            'eleve_user_id' => $iduser,
            'feuille_emargement_id' => $feuille->id,
            'statut' => '1'
        ]);

        if (!$signature->save()) {
            return response(['message' => 'Fail to save'], 500);
        }
        return response(['message' => 'La signature de l\'élève a bien été enregistrée'], 200);
    }

    public function hasEleveSigned($idcours, $iduser) {

        $cours = Cour::query()->where('id', '=', $idcours)->first();
        $feuille = FeuilleEmargement::query()->where('id', '=', $cours->id)->first();

        $signature = SignatureFeuilleEmargement::query()
            ->where('feuille_emargement_id', '=', $feuille->id)
            ->where('eleve_user_id', '=', $iduser)
            ->count();
        if ($signature > 0) {
            return response(['hassigned' => 'true']);
        }
        return response(['hassigned' => 'false']);
    }

    public function getEleveCours($idcours) {
        $cours = Cour::query()->where('id', '=', $idcours)->first();
        $classe = $cours->classe;

        $eleves = Eleve::where('classe_id', '=', $classe->id)->get();

        return $eleves->toArray();
    }

}
