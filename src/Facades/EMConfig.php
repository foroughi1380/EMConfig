<?php
namespace Gelim\EMConfig\Facades;

use Gelim\EMConfig\Database\Models\Config;
use Gelim\EMConfig\Database\Models\Configuration;
use Illuminate\Support\Facades\Facade;


/**
 * @method static void init()
 * @method static Config get($scope, $key, $default=null)
 */
class EMConfig extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "emconfing-config";
    }
}
