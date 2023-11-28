<?php
namespace Gelim\EMConfig\Providers;

use Gelim\EMConfig\Commands\AddCommand;
use Gelim\EMConfig\Commands\GetCommand;
use Gelim\EMConfig\Commands\InitCommand;
use Gelim\EMConfig\Commands\ResetValueCommand;
use Gelim\EMConfig\Commands\ReviewCommand;
use Gelim\EMConfig\Database\Repository\EloquentConfigRepository;
use Gelim\EMConfig\Database\Repository\IConfigRepository;
use Gelim\EMConfig\EMConfig;
use Gelim\EMConfig\EMConfigSetManager;
use Gelim\EMConfig\Services\ConfigSetService;
use Gelim\EMConfig\Services\EMConfigService;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . "/../Database/Migrations");
        $this->publishes([
            __DIR__ . "/../Configs/". EMConfig::CONFIG_FILE_NAME . ".php"=> config_path(EMConfig::CONFIG_FILE_NAME . ".php")
        ],["emconfig"]);
        $this->commands([
            InitCommand::class,
            ReviewCommand::class,
            ResetValueCommand::class,
            AddCommand::class,
            GetCommand::class
        ]);
    }

    public function register()
    {
        $this->app->singleton(IConfigRepository::class , function (){
            return new EloquentConfigRepository();
        });

        $this->app->singleton("emconfing-config" , function (){
            return new EMConfigService();
        });

        $this->app->singleton(ConfigSetService::class, function(){
            return new ConfigSetService();
        });
    }
}
