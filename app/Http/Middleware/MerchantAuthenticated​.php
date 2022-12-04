<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MerchantAuthenticated​
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (\Auth::check()) {
            if (\Auth::user()->isUser()) {
                return redirect(route('user.dashboard'));
            } elseif (\Auth::user()->isMerchant()) {
                return $next($request);
            }
        }

        abort(404);
    }
}
