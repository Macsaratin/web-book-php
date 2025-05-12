<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
{
    if (!Auth::check()) {
        return redirect()->route('auth.login');
    }

    $user = Auth::user();
    if ($user->status != 1 || !in_array($user->roles, $roles)) {
        return redirect()->route('admin.home');
    }

    return $next($request);
}

    
}
