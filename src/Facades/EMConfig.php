<?php
namespace Gelim\EMConfig\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static void init()
 * @method static void review()
 * @method static void resetValue($scope=null)
 * @method static \Gelim\EMConfig\EMConfig scope($scope)
 */
class EMConfig extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "emconfing-config";
    }
}
