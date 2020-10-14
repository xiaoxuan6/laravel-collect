<?php
/**
 * Created by PhpStorm.
 * User: james.xue
 * Date: 2020/10/12
 * Time: 17:01
 */

namespace Vinhson\LaravelCollect;

use Illuminate\Support\ServiceProvider;

class LaravelCollectServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/collect.php' => config_path("collect.php")], "collect");
            $this->publishes([__DIR__ . '/../migrations/' => database_path('migrations')], "collect-migrations");

            $this->loadMigrationsFrom(__DIR__ . '/../migrations/');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/collect.php', 'collect');
    }
}