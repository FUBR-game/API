<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = \auth()->user();

            if ($user->accessTokens()->where('revoked', '=', false)->where('expires_at', '>', now())->count() > 0) {
                $tokenObj = $user->accessTokens->last();
            } else {
                \Auth::user()->createToken("Launcher");
                $tokenObj = $user->accessTokens->last();
            }

            return redirect()->to('api/user');
        }

        return $next($request);
    }
}
