<?php
namespace Gelim\EMConfig\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static void init()
 * @method static void review()
 * @method static void resetValue($scope=null)
 */
class EMConfig extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "emconfing-config";
    }
}
