<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\View\FileViewFinder;
use App\Theme;

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
        $theme = Theme::all()->first();

        if (auth()->check()) {
            if (isset(auth()->user()->settings['theme'])) {
                $theme = Theme::find(auth()->user()->settings['theme']);
            }
        }

        $finder = new FileViewFinder(app()['files'], [resource_path('views') . DIRECTORY_SEPARATOR . $theme->path]);

        view()->setFinder($finder);

//        view()->composer('*', function ($view) use ($darkMode) {
//            return $view->with('darkMode', $darkMode);
//        });

        return $next($request);
    }
}
