<?php
namespace Gelim\EMConfig\Providers;

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
        ],"emconfig");
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
