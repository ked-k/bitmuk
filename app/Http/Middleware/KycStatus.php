<?php

namespace App\Http\Middleware;

use App\Models\Kyc;
use Closure;
use Illuminate\Http\Request;

class KycStatus
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $kyc = auth()->user()->kyc->first();
        if (isset($kyc->status) && $kyc->status == Kyc::APPROVED) {
            return $next($request);
        }
        notify()->warning('Your account is unverified with Kyc');
        return redirect()->back();
    }
}
