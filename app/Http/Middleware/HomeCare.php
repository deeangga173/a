<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeCare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    $user = $request->user();
    
    if ($request->is('freelancer')) {
        return $next($request);
    } elseif ($request->is('employer')) {
        return $next($request);
    }
    
    if ($user->status == "admin") {
        return $next($request);
    } 
    
    return redirect('login');
}
}
