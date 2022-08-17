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
        $posts = Eleve::all()->toArray();
        return array_reverse($posts);
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
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // Mot de passe = password
            'role' => 4
        ]);
        $user->save();
        $eleveID = $user->refresh()->id;

        $eleve = new Eleve( [
            'user_id' => $eleveID
        ]);


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

        return response()->json('L\'élève a bien été mis à jour !');
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        $post = Eleve::find($id);
        $post->delete();

        return response()->json('L\'élève a bien été supprimé !');
    }
}

