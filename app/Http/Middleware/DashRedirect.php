<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashRedirect
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
        if (Auth::user()->user_type == "Admin") {
            return redirect()->route('admin.dashboard');
        }

        if (Auth::user()->user_type == "Patient") {
            return redirect()->route('patient.dashboard');
        }

        if (Auth::user()->user_type == "Doctor") {
            return redirect()->route('doctor.dashboard');
        }

        if (Auth::user()->user_type == "Pharmacist") {
            return redirect()->route('pharmacist.dashboard');
        }
        return $next($request);
    }
}
