<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMidd
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) //Внедряется до доступа к конечному маршруту
    {
        if(Auth::check())
        {
            return $next($request);
        }
        abort(404);
    }
}
