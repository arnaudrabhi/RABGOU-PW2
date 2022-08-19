<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostEleveController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
    {
        $eleves = Eleve::all();
        $eleveArray = [];
        foreach ($eleves as $key => $eleve) {
            $eleveArray[] = array_merge($eleve->toArray(), $eleve->user->toArray());
        }

        return array_reverse($eleveArray);
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
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // Mot de passe = 'password'
            'role' => 4
        ]);

        if(!$user->save()) {
            return abort(500, 'L\'élève n\'a pas pu être enregistré (user)');
        }

        $eleve = new Eleve([
            'user_id' => $user->refresh()->id
        ]);

        if(!$eleve->save()) {
            return abort(500, 'L\'élève n\'a pas pu être enregistré (eleve)');
        }

        return response()->json('L\'élève a bien été crée !');
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        $post = Eleve::find($id);
        return response()->json($post);
    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse
    {
        $post = Eleve::find($id);
        $post->update($request->all());

        return response()->json([
            'message' => 'L\'élève a bien été mis à jour !',
            'eleve' => $post
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        $user = User::find($id);
        $eleve = Eleve::where('user_id', "=", $id)->first();
        $user->delete();
        $eleve->delete();

        return response()->json([
            'message' => 'L\'élève a bien été supprimé !',
            'ok' => true
        ]);
    }
}

