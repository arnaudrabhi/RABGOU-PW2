<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param mixed ...$roles
     * @return Response|RedirectResponse|JsonResponse
     */
    public function handle(Request $request, Closure $next, ...$roles): Response|RedirectResponse|JsonResponse
    {
        // $roles est un array
        foreach ($roles as $role) {
            if ($request->user()->role == $role) {
                return $next($request);
            }
        }
        abort(403);
    }
}
