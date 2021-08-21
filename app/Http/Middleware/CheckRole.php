<?php

namespace App\Http\Middleware;

use Spatie\Permission\Traits\HasRoles;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->user()->hasRole([$role])) {
            return $next($request);
        }
        
        return redirect()->back();
    }
}
