<?php
namespace OpenToCode\InitSettings\Providers;

use Illuminate\Support\ServiceProvider;
use OpenToCode\InitSettings\Console\CrudMakeCommand;

class InitSettingsServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap the application services.
    *
    * @return void
    */
    public function boot(): void
    {
        //
    }

    /**
    * Register the application services.
    *
    * @return void
    */
    public function register(): void
    {
        $this->loadCommands();
    }

    /**
     * @return void
     */
    private function loadCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CrudMakeCommand::class,
            ]);
        }
    }
}
