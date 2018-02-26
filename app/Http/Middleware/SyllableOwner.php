<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use App\Syllable;
class SyllableOwner
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        if ($request->syllable->ups->user == $this->auth->user() or $this->auth->user()->type=='coordinator')
            return $next($request);
        else
        {
            \Alert::danger('El sílabo al que intentas acceder no está asignado a tu usuario, si crees que se trata de un error contacta con el administrador del sistema');
            return redirect(route('syllable.index'));
        }
    }
}
