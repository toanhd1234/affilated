<?php

namespace App\Providers;

use File;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $modulesPath = base_path('modules');
        $directories = array_map('basename', File::directories($modulesPath));
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $modulesPath = base_path('modules');
        $directories = array_map('basename', File::directories($modulesPath));

        foreach ($directories as $moduleName) {
            $this->registerModule($modulesPath, $moduleName);
        }
    }

    private function registerModule(string $modulesPath, string $moduleName)
    {
        $module = $modulesPath . "/$moduleName/";

        // Load route
        if (File::exists($module . 'routes/index.php')) {
            $this->loadRoutesFrom($module . 'routes/index.php');
        }
    }
}
