<?php

namespace Omerhan\Spanel\Http\Middleware;

use Closure;
use Omerhan\Spanel\Models\Lang;
use Illuminate\Support\Facades\Session;

class SetLocale
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
        if(Session::has('locale')){
            \App::setLocale(Session::get('locale'));
        }else{
            Session::put('locale',config('spanel.defaultLang'));
            \App::setLocale(Session::get('locale'));
        }

        $menulangs = Lang::whereActive(1)->orderBy('order', 'ASC')->get();
        view()->share(compact('menulangs'));

        return $next($request);

    }
}
