<?php

namespace Omerhan\Spanel\Http\Middleware;
use Omerhan\Spanel\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function handle($request, Closure $next)
    {
        $user = User::find(Auth::user()->id);
        $roles = $this->getRole($request->route());
        if ($user->hasRole($roles) || !$roles){
            if(Auth::user()->active == 0){
                Auth::logout();
                redirect()->guest('/');
            }else{
                return $next($request);
            }
        }
        return redirect()->guest('/');
    }

    public function getRole($route){
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }


}
