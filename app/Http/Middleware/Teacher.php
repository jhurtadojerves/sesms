<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Teacher
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->isTeacher() || $this->auth->user()->isCoordinator())
            return $next($request);
        else {
            \Alert::danger('No tienes permisos para acceder a este recurso. Esta es una sección restringida al personal académico. Intenta iniciar sesión con una cuenta diferente');
            return redirect(route('home'));
        }
    }
}
