<?php

namespace Savannabits\FilamentModules\Http\Livewire\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Nwidart\Modules\Laravel\Module;

/**
 * @property ComponentContainer $form
 */
class BaseLogin extends Component implements HasForms
{
    public static string $module; // TODO: Implement this.
<<<<<<< HEAD

=======
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
    public static string $context; // TODO: Implement this

    use InteractsWithForms;
    use WithRateLimiting;

    public ?string $email = '';

    public ?string $password = '';

    public ?bool $remember = false;

<<<<<<< HEAD
    private function getModule(): Module
    {
=======
    private function getModule(): Module {
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
        return app('modules')->findOrFail(static::$module);
    }

    /**
     * @throws \Exception
     */
<<<<<<< HEAD
    private function getContextName(): string
    {
        $module = $this->getModule();
        if (! static::$context) {
            throw new \Exception('Context has to be defined in your class');
        }

=======
    private function getContextName(): string {
        $module = $this->getModule();
        if (!static::$context) {
            throw new \Exception("Context has to be defined in your class");
        }
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
        return \Str::of($module->getLowerName())->append('-')->append(\Str::slug(static::$context))->kebab()->toString();
    }

    /**
     * @throws \Exception
     */
    public function mount(): void
    {
        $name = $this->getContextName();
        $guardName = config("$name.auth.guard");

        if (Auth::guard($guardName)->check()) {
            redirect()->route("$name.pages.dashboard");
        }

        $this->form->fill();
    }

    public function authenticate(Request $request)
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            throw ValidationException::withMessages([
                'email' => __('filament::login.messages.throttled', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]),
            ]);
        }
        $name = $this->getContextName();

        $data = $this->form->getState();

        $guardName = config("$name.auth.guard");

<<<<<<< HEAD
        if (! Auth::guard($guardName)->attempt([
=======
        if (!Auth::guard($guardName)->attempt([
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
            'email' => $data['email'],
            'password' => $data['password'],
        ], $data['remember'])) {
            throw ValidationException::withMessages([
                'email' => __('filament::login.messages.failed'),
            ]);
        }

        $request->session()->regenerate();
<<<<<<< HEAD

=======
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
        return redirect()->route("$name.pages.dashboard");
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->label(__('filament::login.fields.email.label'))
                ->email()
                ->required()
                ->autocomplete(),
            TextInput::make('password')
                ->label(__('filament::login.fields.password.label'))
                ->password()
                ->required(),
            Checkbox::make('remember')
                ->label(__('filament::login.fields.remember.label')),
        ];
    }

    public function render(): View
    {
        $module = $this->getModule();
        $name = $module->getStudlyName();
<<<<<<< HEAD

=======
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
        return view('filament::login')
            ->layout('filament::components.layouts.card', [
                'title' => __("$name Login"),
            ]);
    }
}
