<?php

namespace App\Http\Middleware;

use Closure;

class checkhome
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (\Auth::user()->isAdmin == true) {
        //     return redirect()->route('admin.dashboard');
        // }
        if ((int)\Auth::user()->role == 1 && \Auth::user()->isAdmin == false) {
            return redirect()->route('freelancer.index');

        }
        if ((int)\Auth::user()->role == 2 && \Auth::user()->isAdmin == false) {
            return redirect()->route('employer.index');

        }
        return $next($request);
    }
}
