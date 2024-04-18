<?php

namespace Akhmads\Crud;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Akhmads\Crud\Console\Commands\CrudInstallCommand;
use Akhmads\Crud\Console\Commands\CrudUninstallCommand;
use Akhmads\Crud\View\Components\BsLayout;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Blade::component('bs-layout', BsLayout::class);

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'crud');

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    // Publishing the configuration file.
    protected function bootForConsole(): void
    {
        $this->commands([CrudInstallCommand::class, CrudUninstallCommand::class]);
    }
}
