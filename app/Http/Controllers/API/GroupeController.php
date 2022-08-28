<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use App\Models\Groupe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GroupeController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
    {
        $groupes = Groupe::all();

        return array_reverse($groupes->toArray());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function add(Request $request): JsonResponse
    {

        $groupe = new Groupe([
            'libelle' => $request->input('libelle')
        ]);

        if(!$groupe->save()) {
            return abort(500, 'Le groupe n\'a pas pu être enregistré');
        }

        return response()->json([
            'groupe' => $groupe,
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function get($id): JsonResponse
    {
        $groupe = Groupe::find($id);
        return response()->json($groupe);
    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse
    {
        $groupe = Groupe::find($id);
        $groupe->update($request->all());

        return response()->json([
            'message' => 'Le groupe a bien été mis à jour !',
            'groupe' => $groupe
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        $groupe = Groupe::find($id);
        $groupe->delete();

        return response()->json([
            'message' => 'Le groupe a bien été supprimé !',
            'ok' => true
        ]);
    }
}

