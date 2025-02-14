<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $requiredPlan): Response
    {
        $user = Auth::user();

        if(!$user || $user->plan !== $requiredPlan)
        {
            abort(403, 'Accès interdit - Plan requis : ' . $requiredPlan);
        }

        return $next($request);
    }
}
