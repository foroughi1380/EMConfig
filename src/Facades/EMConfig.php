<?php
namespace Gelim\EMConfig\Facades;

use Gelim\EMConfig\Database\Models\Configuration;
use Illuminate\Support\Facades\Facade;


/**
 * @method static void init()
 * @method static void review()
 * @method static void resetValue($scope=null)
 * @method static \Gelim\EMConfig\EMConfig scope($scope)
 * @method static array scopes()
 * @method static array scopesKeysRaw($scope)
 * @method static array keys($scope=null)
 * @method static bool set($key, $value, $scope=null)
 * @method static mixed get($key, $default=null,$scope=null)
 * @method static Configuration|null getRow($key, $scope=null)
 */
class EMConfig extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "emconfing-config";
    }
}
