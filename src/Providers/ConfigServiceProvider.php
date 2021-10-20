<?php
namespace Gelim\EMConfig\Providers;

use Gelim\EMConfig\EMConfig;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom("Database/Migrations");
    }

    public function register()
    {
        $this->app->singleton("emconfing-config" , function (){
            return new EMConfig();
        });
    }
}
