<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        $isLogged = auth()->check();
        if($isLogged){
            $user = auth()->user();
            if($user->role == 'admin'){
                return $next($request);
            }
            else{
                return redirect()->route('admin.login.form');
            }
        }
        return redirect()->route('admin.login.form');
    }
}
