<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestMiddleware
{
    
    public function handle(Request $request, Closure $next, ...$guards)
    {

        if($request->number != 1) {
            return redirect(route('home'));
            // return redirect()->route('home');
        }

        return $next($request);
    }
}
