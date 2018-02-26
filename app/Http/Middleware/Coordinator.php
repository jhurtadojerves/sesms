<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Coordinator
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->isCoordinator())
            return $next($request);
        else{
            \Alert::danger('No tienes permisos para acceder a este recurso');
            return redirect(route('home'));
        }
    }
}
