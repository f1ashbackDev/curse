<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdminOrManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
//        if(Auth::user() != null){
//            if(Auth::user()->role == 'Администратор' or Auth::user()->role == 'Менеджер'){
//                return $next($request);
//            }
//        }
//        return redirect()->route('index');
    }
}
