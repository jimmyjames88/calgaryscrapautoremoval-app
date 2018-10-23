<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $slug)
    {
		if(! auth()->user()->hasPermission($slug)){
			session()->flash('error', 'Permission denied');
			return redirect('/admin');
		}
        return $next($request);
    }
}
