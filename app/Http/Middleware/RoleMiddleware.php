<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!$request->user()) {
            return response()->json([
                'status' => 401,
                'error' => 'Unauthenticated',
            ], 401);
        }
        if (!in_array($request->user()->role, $roles)) {
            return response()->json([
                'status' => 403,
                'error' => 'Forbidden',
                'debug' => $request->user()->role,
            ], 403);
        }
        return $next($request);
    }
}
