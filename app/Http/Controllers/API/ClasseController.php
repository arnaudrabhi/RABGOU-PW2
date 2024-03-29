<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClasseController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
    {
        $classes = Classe::all();
        return array_reverse($classes->toArray());
    }
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function add(Request $request): JsonResponse
    {

        $Classe = new Classe([
            'nom' => $request->input('nom')
        ]);

        if(!$Classe->save()) {
            return abort(500, 'La classe n\'a pas pu être enregistré');
        }

        return response()->json([
            'Classe' => $Classe,
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function get($id): JsonResponse
    {
        $Classe = Classe::find($id);
        return response()->json($Classe);
    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse
    {
        $Classe = Classe::find($id);
        $Classe->update($request->all());

        return response()->json([
            'message' => 'Le Classe a bien été mis à jour !',
            'Classe' => $Classe
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        $Classe = Classe::find($id);
        $Classe->delete();

        return response()->json([
            'message' => 'Le Classe a bien été supprimé !',
            'ok' => true
        ]);
    }
}
