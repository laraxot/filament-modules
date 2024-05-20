<?php

namespace Savannabits\FilamentModules;

use Filament\Facades\Filament;
use Filament\FilamentManager;
use Illuminate\Support\Traits\ForwardsCalls;

class FilamentModules
{
<<<<<<< HEAD
=======

>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
    use ForwardsCalls;

    protected array $contexts = [];

    protected ?string $currentContext = null;

<<<<<<< HEAD
=======
    /**
     * @param FilamentManager $filament
     */
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
    public function __construct(FilamentManager $filament)
    {
        $this->contexts['filament'] = $filament;
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function setContext(?string $context = null)
=======
     * @param string|null $context
     * @return $this
     */
    public function setContext(string $context = null)
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
    {
        $this->currentContext = $context;

        return $this;
    }

<<<<<<< HEAD
=======
    /**
     * @return string
     */
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
    public function currentContext(): string
    {
        return $this->currentContext ?? 'filament';
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->contexts[$this->currentContext ?? 'filament'];
    }

<<<<<<< HEAD
=======
    /**
     * @return array
     */
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
    public function getContexts(): array
    {
        return $this->contexts;
    }

    /**
<<<<<<< HEAD
=======
     * @param string $name
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
     * @return $this
     */
    public function addContext(string $name)
    {
        $this->contexts[$name] = new ContextManager($name);
<<<<<<< HEAD

=======
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
        return $this;
    }

    /**
<<<<<<< HEAD
=======
     * @param string $context
     * @param callable $callback
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
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

<<<<<<< HEAD
    /**
=======

    /**
     * @param callable $callback
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
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
     *
<<<<<<< HEAD
=======
     * @param string $method
     * @param array $parameters
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        $response = $this->forwardCallTo($this->getContext(), $method, $parameters);

        if ($response instanceof FilamentManager) {
            return $this;
        }

        return $response;
    }
<<<<<<< HEAD
=======


>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
}
