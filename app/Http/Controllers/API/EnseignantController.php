<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * @return array
     */
    public function index(): JsonResponse
    {
        $posts = Enseignant::all()->toArray();
        return response()->json(json_encode(array_reverse($posts)));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function add(Request $request): JsonResponse
    {
        $user = new User([
            'civ' => $request->input('civ'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            // TODO : Retirer le mot de passe par défaut
            'password' => 'password', // Mot de passe = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            'role' => 2
        ]);

        if(!$user->save()) {
            return abort(500, 'L\'enseignant n\'a pas pu être enregistré (user)');
        }
        $user->refresh();

        $enseignant = new Enseignant([
            'user_id' => $user->id,
            'matiere' => $request->input('matiere'),
        ]);

        if(!$enseignant->save()) {
            return abort(500, 'L\'enseignant n\'a pas pu être enregistré (enseignant)');
        }

        return response()->json('L\'enseignant a bien été crée !');
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function get($id): JsonResponse
    {
        $enseignant = Enseignant::find($id);
        return response()->json($enseignant);
    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse
    {
        $enseignant = Enseignant::find($id);
        $enseignant->update($request->all());

        return response()->json('L\'enseignant a bien été mis à jour !');
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        $enseignant = Enseignant::find($id);
        $enseignant->delete();

        return response()->json('L\'enseignant a bien été supprimé !');
    }
}

