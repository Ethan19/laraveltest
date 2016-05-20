<?php

namespace App\Http\Middleware;

use Closure;

class OldMiddeleware
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
        if($request->inpit('age')<200){
            return redirect('home');
        }
        return $next($request);
    }
}
