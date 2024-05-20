<?php

namespace Savannabits\FilamentModules\Concerns;

use Filament\Facades\Filament;

trait ContextualResource
{
    public static function getRouteBaseName(): string
    {
        $slug = static::getSlug();

<<<<<<< HEAD
        return Filament::currentContext().".resources.{$slug}";
=======
        return Filament::currentContext() . ".resources.{$slug}";
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
    }
}
