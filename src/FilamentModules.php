<?php

declare(strict_types=1);

namespace Savannabits\FilamentModules;

use Filament\Facades\Filament;
use Filament\FilamentManager;
use Illuminate\Support\Traits\ForwardsCalls;

class FilamentModules
{
    use ForwardsCalls;

    protected array $contexts = [];

    protected ?string $currentContext = null;

<<<<<<< HEAD
=======
    /**
     * @param  FilamentManager  $filament
     */
>>>>>>> 4af7d7d (Fix styling)
    public function __construct(FilamentManager $filament)
    {
        $this->contexts['filament'] = $filament;
    }

    /**
<<<<<<< HEAD
=======
     * @param  string|null  $context
>>>>>>> 4af7d7d (Fix styling)
     * @return $this
     */
    public function setContext(?string $context = null)
    {
        $this->currentContext = $context;

        return $this;
    }

    public function currentContext(): string
    {
        return $this->currentContext ?? 'filament';
    }

    public function getContext()
    {
        return $this->contexts[$this->currentContext ?? 'filament'];
    }

    public function getContexts(): array
    {
        return $this->contexts;
    }

    /**
<<<<<<< HEAD
=======
     * @param  string  $name
>>>>>>> 4af7d7d (Fix styling)
     * @return $this
     */
    public function addContext(string $name)
    {
        $this->contexts[$name] = new ContextManager($name);

        return $this;
    }

    /**
<<<<<<< HEAD
=======
     * @param  string  $context
     * @param  callable  $callback
>>>>>>> 4af7d7d (Fix styling)
     * @return $this
     */
    public function forContext(string $context, callable $callback)
    {
        $currentContext = Filament::currentContext();

        Filament::setContext($context);

        $callback();

        Filament::setContext($currentContext);

        return $this;
    }

    /**
<<<<<<< HEAD
=======
     * @param  callable  $callback
>>>>>>> 4af7d7d (Fix styling)
     * @return $this
     */
    public function forAllContexts(callable $callback)
    {
        $currentContext = Filament::currentContext();

        foreach ($this->contexts as $key => $context) {
            Filament::setContext($key);

            $callback();
        }

        Filament::setContext($currentContext);

        return $this;
    }

    /**
     * Dynamically handle calls into the filament instance.
<<<<<<< HEAD
=======
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
>>>>>>> 4af7d7d (Fix styling)
     */
    public function __call(string $method, array $parameters)
    {
        $response = $this->forwardCallTo($this->getContext(), $method, $parameters);

        if ($response instanceof FilamentManager) {
            return $this;
        }

        return $response;
    }
}
