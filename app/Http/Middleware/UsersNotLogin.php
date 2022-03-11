<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersNotLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userRole = Auth::user()->getRoleNames();
        if ($userRole['0'] == 'user') {
            $redirectUrl = config('ban.redirect_url', null);
            $errors = [
                'login' => 'You cannot log in',
            ];
            $responseCode = $request->header('X-Inertia') ? 303 : 302;
            if ($redirectUrl === null) {
                return redirect()->back($responseCode)->withInput()->withErrors($errors);
            } else {
                return redirect($redirectUrl, $responseCode)->withInput()->withErrors($errors);
            }
        } else {
            return $next($request);
        }
    }
}
