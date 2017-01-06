<?php

namespace App\Http\Middleware;

use Closure;

class Language
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
        // Set default locale.
        if (!session('locale')) session(['locale' => 'en']);

        // Set application's locale based on session locale.
        \App::setLocale(session('locale'));

        return $next($request);
    }
}
