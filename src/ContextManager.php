<?php

namespace Savannabits\FilamentModules;

use Filament\FilamentManager;
use Illuminate\Contracts\Auth\Guard;

class ContextManager extends FilamentManager
{
<<<<<<< HEAD
=======
    /**
     * @var string|null
     */
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
    protected static ?string $config = null;

    public function __construct($config)
    {
        static::$config = $config;
    }

<<<<<<< HEAD
    public static function getAuth(): ?Guard
    {
        return static::$config ? auth()->guard(config(static::$config.'.auth.guard')) : null;
    }

=======
    /**
     * @return Guard|null
     */
    public static function getAuth(): ?Guard
    {
        return static::$config ? auth()->guard(config(static::$config . '.auth.guard')) : null;
    }


    /**
     * @return Guard
     */
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
    public function auth(): Guard
    {
        return static::getAuth() ?? auth()->guard(config('filament.auth.guard'));
    }
}
