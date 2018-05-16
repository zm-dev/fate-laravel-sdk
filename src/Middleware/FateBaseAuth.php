<?php

namespace ZMDev\FateSDK\Middleware;

use ZMDev\FateSDK\Auth;

class FateBaseAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, \Closure $next)
    {
        $auth = app(Auth::class);
        if ($auth->needLogin($request)) {
            return $auth->login();
        }
        return $next($request);
    }
}
