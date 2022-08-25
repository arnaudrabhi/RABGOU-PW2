<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmargementController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
    {
        $classes = Classe::all();
        $classeArray = [];
        foreach ($classes as $key => $classe) {
            $classeArray[] = array_merge($classe->toArray());
        }

        return array_reverse($classeArray);
    }
}
