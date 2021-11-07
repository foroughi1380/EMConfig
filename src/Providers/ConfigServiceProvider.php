<?php
namespace Gelim\EMConfig\Providers;

use Gelim\EMConfig\Commands\InitCommand;
use Gelim\EMConfig\Commands\ResetValueCommand;
use Gelim\EMConfig\Commands\ReviewCommand;
use Gelim\EMConfig\Database\Repository\EloquentConfigRepository;
use Gelim\EMConfig\Database\Repository\IConfigRepository;
use Gelim\EMConfig\EMConfig;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . "/../Database/Migrations");
        $this->publishes([
            __DIR__ . "/../Configs/configSet.php" => config_path("configSet.php")
        ],["emconfig", "laravel-assets"]);
        $this->commands([
            InitCommand::class,
            ReviewCommand::class,
            ResetValueCommand::class
        ]);
    }

    public function register()
    {
        $this->app->singleton("emconfing-config" , function (){
            return new EMConfig();
        });

        $this->app->singleton(IConfigRepository::class , function (){
            return new EloquentConfigRepository();
        });
    }
}
