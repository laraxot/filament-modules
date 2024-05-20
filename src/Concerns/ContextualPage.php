<?php

namespace Savannabits\FilamentModules\Concerns;

use Filament\Facades\Filament;

trait ContextualPage
{
    public static function getRouteName(): string
    {
        $slug = static::getSlug();

<<<<<<< HEAD
        return Filament::currentContext().".pages.{$slug}";
=======
        return Filament::currentContext() . ".pages.{$slug}";
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
    }
}
