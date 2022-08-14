<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param int $role
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, int $role)
    {
        // Ici l'id correspond a l'id_role
        if ($request->user()->role == $role) {
            return $next($request);
        }
        abort(403);
    }
}
