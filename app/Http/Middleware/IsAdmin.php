<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = session('user');

        if (!$user || $user->is_admin != 1) {
            abort(403, 'Bạn không có quyền truy cập');
        }

        return $next($request);
    }
}
<<<<<<< HEAD
//app/Http/Middleware/IsAdmin.php
=======
>>>>>>> 7ef827f9323d0c027daa86036c9cb8f1342a4fd6
