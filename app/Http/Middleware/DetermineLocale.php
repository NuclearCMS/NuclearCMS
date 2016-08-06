<?php

namespace Reactor\Http\Middleware;


use Closure;
use Reactor\Support\Install\InstallHelper;

class DetermineLocale {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Set Reactor locale
        if (is_request_install() || is_request_reactor())
        {
            $locale = env('REACTOR_LOCALE');

            if (array_key_exists($locale, InstallHelper::$locales))
            {
                set_app_locale($locale, false);
            }

            return $next($request);
        }

        // Else set site locale
        $locale = session()->has('_locale') ?
            session('_locale') :
            $request->getPreferredLanguage();

        if (in_array($locale, config('translatable.locales')))
        {
            set_app_locale($locale);
        }

        return $next($request);
    }

}