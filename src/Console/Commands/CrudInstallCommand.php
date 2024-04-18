<?php

namespace Akhmads\Crud\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Filesystem\Filesystem;

class CrudInstallCommand extends Command
{
    protected $signature = 'crud:install';

    protected $description = 'Installing crud demo';

    protected $ds = DIRECTORY_SEPARATOR;

    public function handle()
    {
        $this->info("Crud demo installer ❤️");

        $this->info("Copying file...");

        (new Filesystem)->ensureDirectoryExists(base_path('app/Http/Controllers/Demo'));
        (new Filesystem)->ensureDirectoryExists(base_path('resources/views/demo/users'));

        (new Filesystem)->copy(__DIR__.'/../../routes/demo.php', base_path('routes/demo.php'));
        (new Filesystem)->copy(__DIR__.'/../../../stubs/Controllers/Demo/UserController.php', base_path('app/Http/Controllers/Demo/UserController.php'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../../stubs/resources/views/demo/users', base_path('resources/views/demo/users'));

        // (new Filesystem)->copy(__DIR__.'/../../../stubs/resources/views/demo/users/index.blade.php', base_path('resources/views/demo/users/index.blade.php'));
        // (new Filesystem)->copy(__DIR__.'/../../../stubs/resources/views/demo/users/create.blade.php', base_path('resources/views/demo/users/create.blade.php'));
        // (new Filesystem)->copy(__DIR__.'/../../../stubs/resources/views/demo/users/edit.blade.php', base_path('resources/views/demo/users/edit.blade.php'));

        /*
        $this->info("Applying route file...");
        $webRoute = file_get_contents(base_path('routes/web.php'));
        $webRoute = str_replace("require __DIR__.'/demo.php';", "", $webRoute);
        $webRoute = $webRoute . PHP_EOL . "require __DIR__.'/demo.php';";
        file_put_contents(base_path('routes/web.php'), $webRoute);
        */

        $this->info("Done");
    }
}
