<?php

<<<<<<< HEAD
namespace Savannabits\FilamentModules\Http\Middleware;

use Closure;
=======
declare(strict_types=1);

namespace Savannabits\FilamentModules\Http\Middleware;

>>>>>>> origin/dev
use Filament\Facades\Filament;
use Illuminate\Http\Request;

class ApplyContext
{
    /**
     * Handle an incoming request.
<<<<<<< HEAD
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $context)
=======
     */
    public function handle(Request $request, \Closure $next, $context)
>>>>>>> origin/dev
    {
        Filament::setContext($context);

        return $next($request);
    }
}
