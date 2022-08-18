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
     * @param Closure $next
     * @param string|array $roles
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles): Response|RedirectResponse
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
