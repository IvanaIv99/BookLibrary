<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibrarianMiddleware
{

    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()->user_type_id == 1){
            return $next($request);
        }else{
            return redirect()->route('home');
        }
    }
}
