<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\View\FileViewFinder;

class DarkModeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $darkMode = false;

        if (auth()->check()) {
            $darkMode = isset(auth()->user()->settings['dark-mode']);
        }

        $theme = ($darkMode) ? 'dark-theme' : 'light-theme';
        $finder = new FileViewFinder(app()['files'], [resource_path('views') . DIRECTORY_SEPARATOR . $theme]);

        view()->setFinder($finder);

        view()->composer('*', function ($view) use ($darkMode) {
            return $view->with('darkMode', $darkMode);
        });

        return $next($request);
    }
}
