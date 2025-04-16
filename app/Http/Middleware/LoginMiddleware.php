<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('shop.login');
        } else {
            $user = Auth::user();
            // Only allow admins to access specific routes
            if ($user->roles != 'admin') {
                return redirect()->route('admin.home');
            }
        }

        return $next($request);
    }
}
