<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles) /*$roles*/
    {
        //jika akun yang login sesuai dengan role
        //maka silahkan akses
        //jika tidak sesuai akan diarahkan ke home

        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        // if (!Auth::check()) {
        //     return redirect('/login');
        // }
        // $user = Auth::user();

        // if ($user->role == $roles)
        //     return $next($request);

        return redirect('/');

        // return $next($request);
    }
}
