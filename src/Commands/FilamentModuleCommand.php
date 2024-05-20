<?php

namespace Savannabits\FilamentModules\Commands;

use Filament\Support\Commands\Concerns\CanManipulateFiles;
use Filament\Support\Commands\Concerns\CanValidateInput;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
<<<<<<< HEAD
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
=======
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Nwidart\Modules\Exceptions\ModuleNotFoundException;
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
use Nwidart\Modules\Module;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class FilamentModuleCommand extends Command
{
    use CanManipulateFiles;
    use CanValidateInput;
    use ModuleCommandTrait;

    protected $description = 'Create a Filament context in a module';

    protected $name = 'module:make-filament-context';

    protected ?Module $module;

    public function handle(): int
    {
        /*$moduleName = Str::of($this->getContextInput())
            ->trim('/')
            ->trim('\\')
            ->trim(' ')
            ->replace('/', '\\') ?? 'filament';*/
        try {
            $this->module = app('modules')->findOrFail($this->getModuleName());
        } catch (\Throwable $exception) {
<<<<<<< HEAD
            \Log::info($exception->getMessage().' Creating It ...');
            Artisan::call('module:make', ['name' => [$this->argument('module')]]);
=======
            \Log::info($exception->getMessage()." Creating It ...");
            Artisan::call('module:make',['name' => [$this->argument('module')]]);
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
            $this->module = app('modules')->findOrFail($this->getModuleName());
        } finally {
        }

        $context = Str::of($this->argument('context') ?? 'Filament')->studly();
        $this->copyStubs($context);

        $this->createDirectories($context);

        $this->info("Successfully created {$context} context!");

        if ($this->option('guard')) {
            Artisan::call(
                'make:filament-guard',
<<<<<<< HEAD
                $this->option('force') ? [
                    'name' => $context, '--force',
=======
                $this->option('force') ?  [
                    'name' => $context, '--force'
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
                ] : ['name' => $context]
            );
        }

        return static::SUCCESS;
    }

    protected function getContextInput(): string
    {
        return $this->validateInput(
            fn () => $this->argument('module') ?? $this->askRequired('Module Name (e.g. `sales`)', 'module'),
            'module',
            ['required']
        );
    }

    /**
     * Get the console command arguments.
<<<<<<< HEAD
=======
     *
     * @return array
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
     */
    protected function getArguments(): array
    {
        return [
            ['context', InputArgument::REQUIRED, 'The context Name e.g Filament.'],
            ['module', InputArgument::OPTIONAL, 'The name of module will be used.'],
        ];
    }

    /**
     * Get the console command options.
<<<<<<< HEAD
=======
     *
     * @return array
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
     */
    protected function getOptions(): array
    {
        return [
            ['guard', 'G', InputOption::VALUE_NONE, 'Generate a guard middleware.', null],
            ['force', 'F', InputOption::VALUE_NONE, 'Force overwrite of existing files.', null],
        ];
    }

<<<<<<< HEAD
    public function getModuleNamespace()
    {
=======
    public function getModuleNamespace() {
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
        return $this->laravel['modules']->config('namespace').'\\'.$this->getModuleName();
    }

    protected function copyStubs($context)
    {
        $serviceProviderClass = $context->afterLast('\\')->append('ServiceProvider');

        $contextName = $context->afterLast('\\')->kebab();

        $serviceProviderPath = $serviceProviderClass
            ->prepend('/')
<<<<<<< HEAD
            ->prepend(module_path($this->getModuleName(), 'Providers'))
=======
            ->prepend(module_path($this->getModuleName(),'Providers'))
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
            ->append('.php');

        $configPath = $contextName
            ->prepend($this->module->getLowerName().'-')
            ->prepend('/')
<<<<<<< HEAD
            ->prepend(module_path($this->getModuleName(), 'Config'))
=======
            ->prepend(module_path($this->getModuleName(),'Config'))
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
            ->append('.php');
        $moduleNs = Str::of($this->getModuleNamespace());

        $contextNamespace = $context
            ->replace('\\', '\\\\')
            ->prepend('\\\\')
<<<<<<< HEAD
            ->prepend($moduleNs->replace('\\', '\\\\')->toString());

        if (! $this->option('force') && $this->checkForCollision([
=======
            ->prepend($moduleNs->replace('\\','\\\\')->toString());

        if (!$this->option('force') && $this->checkForCollision([
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
            $serviceProviderPath,
        ])) {
            return static::INVALID;
        }

<<<<<<< HEAD
        if (! $this->option('force') && $this->checkForCollision([
=======
        if (!$this->option('force') && $this->checkForCollision([
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
            $configPath,
        ])) {
            return static::INVALID;
        }

        $this->copyStubToApp('ContextServiceProvider', $serviceProviderPath, [
            'class' => (string) $serviceProviderClass,
            'name' => (string) $contextName,
            'Module' => $this->module->getStudlyName(),
            'module' => $this->module->getLowerName(),
            'module_' => $this->module->getSnakeName(),
            'module-' => Str::slug($this->module->getName()),
            'namespace' => $providerNs = $moduleNs->append('\\Providers')->replace('\\\\', '\\'),
        ]);
        // Install the service provider
        $this->installServiceProvider($providerNs->append('\\')->append($serviceProviderClass->toString())->append('::class'));

        // MIDDLEWARE

        $middlewareClass = $context->afterLast('\\')->append('Middleware');

        $middlewarePath = $middlewareClass
<<<<<<< HEAD
            ->prepend(module_path($this->getModuleName(), 'Http/Middleware/'))
            ->append('.php');

        if (! $this->option('force') && $this->checkForCollision([$middlewarePath])) {
=======
            ->prepend(module_path($this->getModuleName(),'Http/Middleware/'))
            ->append('.php');

        if (!$this->option('force') && $this->checkForCollision([$middlewarePath])) {
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
            return static::INVALID;
        }

        $middlewareNs = $moduleNs->append('\\Http\\\Middleware');
        $this->copyStubToApp('ContextMiddleware', $middlewarePath, [
            'class' => (string) $middlewareClass,
            'context' => (string) $contextName,
            'module' => $this->module->getStudlyName(),
            'namespace' => $middlewareNs->replace('\\\\', '\\')->toString(),
        ]);

        // LOGIN

        $loginClass = $context->afterLast('\\')->append('Login');

        $loginPath = $loginClass
<<<<<<< HEAD
            ->prepend(module_path($this->getModuleName(), 'Http/Livewire/Auth/'))
            ->append('.php');

        if (! $this->option('force') && $this->checkForCollision([$loginPath])) {
=======
            ->prepend(module_path($this->getModuleName(),'Http/Livewire/Auth/'))
            ->append('.php');

        if (!$this->option('force') && $this->checkForCollision([$loginPath])) {
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
            return static::INVALID;
        }

        $loginNs = $moduleNs->append('\\Http\\Livewire\\Auth');
        $this->copyStubToApp('ContextLogin', $loginPath, [
            'class' => (string) $loginClass,
            'context' => (string) $contextName,
            'module' => $this->module->getStudlyName(),
            'namespace' => $loginNs->replace('\\\\', '\\')->toString(),
        ]);

        // CONFIG
        $this->copyStubToApp('config', $configPath, [
            'namespace' => (string) $contextNamespace,
<<<<<<< HEAD
            'moduleNamespace' => $moduleNs->replace('\\\\', '\\')->toString(),
=======
            'moduleNamespace' => $moduleNs->replace('\\\\','\\')->toString(),
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
            'path' => (string) $context->replace('\\', '/'),
            'loginClass' => $loginNs->append('\\')->append($loginClass)->append('::class')->replace('\\\\', '\\')->toString(),
            'authMiddleware' => $middlewareNs->append('\\')->append($middlewareClass)->append('::class')->replace('\\\\', '\\')->toString(),
            'module' => $this->module->getStudlyName(),
        ]);
    }

    protected function createDirectories($context)
    {
        $directoryPath = module_path($this->getModuleName(), (string) $context->replace('\\', '/'));

        app(Filesystem::class)->makeDirectory($directoryPath, force: $this->option('force'));
<<<<<<< HEAD
        app(Filesystem::class)->makeDirectory($directoryPath.'/Pages', force: $this->option('force'));
        app(Filesystem::class)->makeDirectory($directoryPath.'/Resources', force: $this->option('force'));
        app(Filesystem::class)->makeDirectory($directoryPath.'/Widgets', force: $this->option('force'));
=======
        app(Filesystem::class)->makeDirectory($directoryPath . '/Pages', force: $this->option('force'));
        app(Filesystem::class)->makeDirectory($directoryPath . '/Resources', force: $this->option('force'));
        app(Filesystem::class)->makeDirectory($directoryPath . '/Widgets', force: $this->option('force'));
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
    }

    protected function copyStubToApp(string $stub, string $targetPath, array $replacements = []): void
    {
        $filesystem = app(Filesystem::class);

<<<<<<< HEAD
        if (! $this->fileExists($stubPath = base_path("stubs/filament/{$stub}.stub"))) {
            $stubPath = __DIR__."/../../stubs/{$stub}.stub";
=======
        if (!$this->fileExists($stubPath = base_path("stubs/filament/{$stub}.stub"))) {
            $stubPath = __DIR__ . "/../../stubs/{$stub}.stub";
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
        }

        $stub = Str::of($filesystem->get($stubPath));

        foreach ($replacements as $key => $replacement) {
            $stub = $stub->replace("{{ {$key} }}", $replacement);
        }

        $stub = (string) $stub;

        $this->writeFile($targetPath, $stub);
    }

    /**
     * Install the service provider in the application configuration file.
     *
<<<<<<< HEAD
     * @param  string  $providerClass  | Fully namespaced service class
     */
    protected function installServiceProvider(string $providerClass, string $after = 'RouteServiceProvider'): void
=======
     * @param string $after
     * @param string $providerClass | Fully namespaced service class
     * @return void
     */
    protected function installServiceProvider(string $providerClass, string $after='RouteServiceProvider'): void
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
    {
        if (! Str::contains($appConfig = file_get_contents(config_path('app.php')), $providerClass)) {
            file_put_contents(config_path('app.php'), str_replace(
                'App\\Providers\\'.$after.'::class,',
                'App\\Providers\\'.$after.'::class,'.PHP_EOL."        $providerClass,",
                $appConfig
            ));
        }
    }

    /**
     * Install the middleware to a group in the application Http Kernel.
     *
     * @param  string  $after
     * @param  string  $name
     * @param  string  $group
     * @return void
     */
    protected function installMiddlewareAfter($after, $name, $group = 'web')
    {
        $httpKernel = file_get_contents(app_path('Http/Kernel.php'));

        $middlewareGroups = Str::before(Str::after($httpKernel, '$middlewareGroups = ['), '];');
        $middlewareGroup = Str::before(Str::after($middlewareGroups, "'$group' => ["), '],');

        if (! Str::contains($middlewareGroup, $name)) {
            $modifiedMiddlewareGroup = str_replace(
                $after.',',
                $after.','.PHP_EOL.'            '.$name.',',
                $middlewareGroup,
            );

            file_put_contents(app_path('Http/Kernel.php'), str_replace(
                $middlewareGroups,
                str_replace($middlewareGroup, $modifiedMiddlewareGroup, $middlewareGroups),
                $httpKernel
            ));
        }
    }
}
