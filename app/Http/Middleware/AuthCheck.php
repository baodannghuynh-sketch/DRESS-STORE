<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
<<<<<<< HEAD
//app/Http/Middleware/AuthCheck.php
=======
>>>>>>> 7ef827f9323d0c027daa86036c9cb8f1342a4fd6
