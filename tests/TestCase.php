<?php

<<<<<<< HEAD
namespace Coolsam\FilamentModules\Tests;
=======
namespace Savannabits\FilamentModules\Tests;
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)

use Coolsam\FilamentModules\ModulesServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
<<<<<<< HEAD
=======
use Savannabits\FilamentModules\FilamentModulesServiceProvider;
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
<<<<<<< HEAD
            fn (string $modelName) => 'Coolsam\\Modules\\Database\\Factories\\'.class_basename($modelName).'Factory'
=======
            fn (string $modelName) => 'Savannabits\\FilamentModules\\Database\\Factories\\'.class_basename($modelName).'Factory'
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
        );
    }

    protected function getPackageProviders($app)
    {
        return [
<<<<<<< HEAD
            ModulesServiceProvider::class,
=======
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            FilamentModulesServiceProvider::class,
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
<<<<<<< HEAD
        $migration = include __DIR__.'/../database/migrations/create_modules_table.php.stub';
=======
        $migration = include __DIR__.'/../database/migrations/create_filament-modules_table.php.stub';
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
        $migration->up();
        */
    }
}
