<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $supportedLocales = ['en', 'vi'];
        $locale = config('app.locale'); // Default

        if ($request->has('lang') && in_array($request->query('lang'), $supportedLocales)) {
            $locale = $request->query('lang');
        } elseif (session('locale') && in_array(session('locale'), $supportedLocales)) {
            $locale = session('locale');
        } elseif ($request->header('Accept-Language')) {
            $preferred = explode(',', $request->header('Accept-Language'))[0];
            $locale = explode('-', $preferred)[0];
            if (!in_array($locale, $supportedLocales)) {
                $locale = config('app.locale');
            }
        }

        App::setLocale($locale);
        session(['locale' => $locale]);

        return $next($request);
    }
}
