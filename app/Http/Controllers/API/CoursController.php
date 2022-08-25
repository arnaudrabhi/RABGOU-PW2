<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Eleve;
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
            $coursArray = [];
            foreach ($cours as $key => $cour) {
                $coursArray[] = array_merge($cour->toArray());
            }

            return $cours->toArray();

//            return [
//                'classe_id' => $eleve->classe->id,
//                'groupe_id' => $eleve->groupe->id
//            ];

            return array_reverse($coursArray);
        }


    }

}
