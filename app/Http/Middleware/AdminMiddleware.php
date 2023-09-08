<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
{
    if(!Auth::check())
    {
        return throw new AuthenticationException();
    }

    $user = $request->user();

    if (!$user->role == $role) {
        return abort(403, "hak akses salah");
    } 

    return $next($request);

}

}
