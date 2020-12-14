<?php

namespace App\Http\Middleware;

use Closure;

class RemoveLocaleParameter
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
        $request->route()->forgetParameter('locale');
        return $next($request);
    }
}
