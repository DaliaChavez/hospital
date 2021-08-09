<?php

namespace App\Http\Middleware;
use Auth;
use Illuminate\Contracts\Auth\Guard;
use Closure;

class medico
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->level == 1  && Auth::user()->status == 1 ) {
            return $next($request);
        }
        return redirect('/login');
    }
}
