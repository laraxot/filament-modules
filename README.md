<<<<<<< HEAD
<p align="center">
    <a href="https://github.com/savannabits/filament-modules/actions?query=workflow%3Arun-tests+branch%3A3.x"><img alt="Tests" src="https://img.shields.io/github/actions/workflow/status/savannabits/filament-modules/run-tests.yml?branch=3.x&label=tests&style=for-the-badge&logo=github"></a>
    <a href="https://github.com/savannabits/filament-modules/actions?query=workflow%fix-php-code-style-issues+branch%3A3.x"><img alt="Styling" src="https://img.shields.io/github/actions/workflow/status/savannabits/filament-modules/fix-php-code-style-issues.yml?branch=3.x&label=code%20style&style=for-the-badge&logo=github"></a>
    <a href="https://laravel.com"><img alt="Laravel v9.x" src="https://img.shields.io/badge/Laravel-v9.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://beta.filamentphp.com"><img alt="Filament v3.x" src="https://img.shields.io/badge/FilamentPHP-v3.x-FB70A9?style=for-the-badge&logo=filament"></a>
    <a href="https://php.net"><img alt="PHP 8.1" src="https://img.shields.io/badge/PHP-8.1-777BB4?style=for-the-badge&logo=php"></a>
    <a href="https://packagist.org/packages/coolsam/modules"><img alt="Packagist" src="https://img.shields.io/packagist/dt/coolsam/modules.svg?style=for-the-badge&logo=home"></a>
</p>

Modules is a FilamentPHP Plugin to enable easy integration with `nwidart/laravel-modules`

**NB: These docs are for v3, which only supports Filament 3. If you are using Filament
v2, [see the documentation here](https://github.com/savannabits/filament-modules/tree/main#readme) to get started.**

For example, if you have two modules (**Blog** and **Pos**), you should be able to have filament installed in each module with separate resources as below:
- Directory **Modules/Blog/Filament** should enable you to access the admin panel via `http://yoururl/blog/admin`
- Directory **Modules/Pos/Filament** should enable you to access the admin panel via `http://yoururl/pos/admin`
- We can even have another context under **Modules/Pos/Filament2** should enable you to access the admin panel via `http://yoururl/pos/admin2` or whichever path you configure for that context.
=======
# Use Filamentphp with nwiDart/laravel-modules

[![Latest Version on Packagist](https://img.shields.io/packagist/v/savannabits/filament-modules.svg?style=flat-square)](https://packagist.org/packages/savannabits/filament-modules)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/savannabits/filament-modules/run-tests?label=tests)](https://github.com/savannabits/filament-modules/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/savannabits/filament-modules/Check%20&%20fix%20styling?label=code%20style)](https://github.com/savannabits/filament-modules/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/savannabits/filament-modules.svg?style=flat-square)](https://packagist.org/packages/savannabits/filament-modules)


>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)

Each of the above directories should have their own distinct **Pages, Resources** and **Widgets**. Each of them also has a config under the module's Config folder allowing you to customize a number of parameters per context, e.g the `path`.
Additionally, each of these can have its own customized login page which redirects back to the module.

You can read more about Multiple Context for Filament [Here](https://github.com/iotronlab/filament-multi-guard).

If this is your goal, then you are in the right place.
 
## Installation
Before you proceed, this guide assumes that you have configured your app fully to work with Laravel Modules. If you haven't, follow the [Laravel Modules Docs](https://docs.laravelmodules.com/v9/installation-and-setup) before proceeding.

Requirements:

1. Filament >= 3
2. PHP >= 8.1
3. Laravel >= 9.0
4. Livewire >= 3.0
5. nwidart/laravel-modules >=10.0

## Installation

- Ensure you have insalled and configured [Laravel Modules (follow these instructions)]()
- Ensure you have installed and configured Filamentphp (follow these instructions)
- You can now install the package via composer:

```bash
<<<<<<< HEAD
composer require coolsam/modules
=======
composer require savannabits/filament-modules
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-modules-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-modules-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-modules-views"
```

This is the contents of the published config file:

```php
return [
];
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
```

## Usage

<<<<<<< HEAD
In this guide we are going to use the `Blog module` as an example

### Create your laravel module:
If the module that you want to work on does not exist, create it using nwidart/laravel-modules

```bash
php artisan module:make Blog # Create the blog module
=======
```php
$filament-modules = new Savannabits\FilamentModules();
echo $filament-modules->echoPhrase('Hello, Savannabits!');
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
```

### Generate a new Panel inside your module

```bash
php artisan module:make-filament-panel admin Blog # php artisan module:make-filament-panel [id] [module]
```
If none of the two arguments are passed, the command will ask for each of them interactively.
In this example, if the Panel id passed is `admin` and the module is blog, the command will generate a panel with
id `blog::admin`. This ID should be used in the next step when generating resources, pages and widgets.

### Generate your resources, pages and widgets as usual, selecting the panel you just created above.
From here on, use filament as you would normally to generate `resources`, `Pages` and `Widgets`. Be sure to specify the `--panel` option as the ID generated earlier.
If the `--panel` option is not passed, the command will ask for it interactively.
```bash
# For each of these commands, the package will ask for the Model and Panel.
php artisan make:filament-resource
php artisan make:filament-page
php artisan make:filament-widget
```

```bash
# The Model and Panel arguments are passed inline
php artisan make:filament-resource Author blog::admin
php artisan make:filament-page Library blog::admin
php artisan make:filament-widget BookStats blog::admin
```

**All Done!** For each of the panels generated, you can navigate to your `module-path/panel-path` e.g `blog/admin` to acess your panel and links to resources and pages.
## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

<<<<<<< HEAD
- [Sam Maosa](https://github.com/coolsam726)
=======
- [Sam Maosa](https://github.com/savannabits)
>>>>>>> ae35070 (Configured Generation of all necessary files to make Filament work in a module)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
