<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class setLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('language')) {
            $lang = $request->header('language') == 'ar' ? 'ar' : 'en';
            app()->setLocale($lang);
        }
        return $next($request);
    }
}
