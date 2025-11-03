<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Example usage: ->middleware('role:admin')
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Not logged in
        }

        $user = Auth::user();

        // Check if user role matches any allowed roles
        if (!in_array($user->role, $roles)) {
            // Optional: redirect students to their dashboard if they access admin pages
            if ($user->role === 'student') {
                return redirect()->route('student.dashboard')->with('error', 'Access denied.');
            }

            else{
                // For other roles not allowed
                abort(403, 'Unauthorized access');
            }

        }

        return $next($request);
    }
}
