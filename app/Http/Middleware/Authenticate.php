<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // Lakukan verifikasi autentikasi
        if ($this->authenticate($request, $guards) === false) {
            return $this->redirectTo($request);
        }

        return $next($request);
    }


}
