<?php

namespace Akhmads\Crud\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Filesystem\Filesystem;

class CrudUninstallCommand extends Command
{
    protected $signature = 'crud:uninstall';

    protected $description = 'Unstalling crud demo';

    public function handle()
    {
        $this->info("Crud demo uninstaller :'(");

        $this->info("Removing file...");

        (new Filesystem)->delete(base_path('app/Http/Controllers/Demo/UserController.php'));
        (new Filesystem)->deleteDirectory(base_path('resources/views/demo/users'));

        // $webRoute = file_get_contents(base_path('routes/web.php'));
        // $webRoute = str_replace("require __DIR__.'/demo.php';", "", $webRoute);
        // file_put_contents(base_path('routes/web.php'), $webRoute);

        $this->info("Done");
    }
}
