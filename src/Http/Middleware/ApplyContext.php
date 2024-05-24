<?php

declare(strict_types=1);

namespace Savannabits\FilamentModules\Http\Middleware;

use Filament\Facades\Filament;
use Illuminate\Http\Request;

class ApplyContext
{
    /**
     * Handle an incoming request.
<<<<<<< HEAD
=======
     *
     * @return mixed
>>>>>>> edb9da4 (Fix styling)
     */
    public function handle(Request $request, \Closure $next, $context)
    {
        Filament::setContext($context);

        return $next($request);
    }
}
