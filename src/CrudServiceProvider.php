<?php

namespace Akhmads\Crud;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Akhmads\Crud\Console\Commands\DemoInstallCommand;
use Akhmads\Crud\Console\Commands\DemoUninstallCommand;
use Akhmads\Crud\View\Components\BsLayout;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Blade::component('bs-layout', BsLayout::class);

        //$this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'akhmads');

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    // Publishing the configuration file.
    protected function bootForConsole(): void
    {
        $this->commands([DemoInstallCommand::class, DemoUninstallCommand::class]);
    }
}
