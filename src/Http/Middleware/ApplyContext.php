<?php

namespace Savannabits\FilamentModules\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;

class ApplyContext
{
    /**
     * Handle an incoming request.
     *
<<<<<<< HEAD
=======
     * @param Request $request
     * @param Closure $next
     * @param $context
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $context)
    {
        Filament::setContext($context);

        return $next($request);
    }
}
