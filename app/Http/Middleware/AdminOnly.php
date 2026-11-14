<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('admin')->check()) {
            return $next($request);
        }

        if (auth('web')->check()) {
            return redirect()->route('user.dashboard')->with('error', 'Halaman tersebut hanya dapat diakses oleh admin.');
        }

        return redirect()->route('filament.admin.auth.login');
    }
}
